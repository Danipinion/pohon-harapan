<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sumQuery = function ($query) {
            $query->where('status', 'paid');
        };

        $baseQuery = Project::withSum(['donations as total_trees' => $sumQuery], 'tree_quantity');

        if ($search) {
            $baseQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('location', 'like', '%' . $search . '%')
                      ->orWhere('short_description', 'like', '%' . $search . '%');
            });
        }

        $activeProjects = (clone $baseQuery)
            ->where('status', 'active')
            ->latest()
            ->get();

        $completedProjects = (clone $baseQuery)
            ->where('status', 'completed')
            ->latest()
            ->get();

        $pendingProjects = (clone $baseQuery)
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('projects.index', compact(
            'activeProjects',
            'completedProjects',
            'pendingProjects',
            'search'
        ));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->with(['projectUpdates' => function ($query) {
                $query->latest();
            }])
            ->firstOrFail();

        if ($project->status === 'pending') {
            return redirect()->route('projects.index')
                         ->with('info', 'Proyek tersebut belum dimulai. Lihat proyek kami yang lain!');
        }

        $totalTrees = $project->donations()->where('status', 'paid')->sum('tree_quantity');
        $co2AbsorptionPerYear = $totalTrees * 25;
        $progressPercentage = ($project->target_trees > 0) ? ($totalTrees / $project->target_trees) * 100 : 0;
        $topDonors = Donation::where('project_id', $project->id)
            ->where('status', 'paid')
            ->select('donor_name', DB::raw('SUM(amount) as total_donation'))
            ->groupBy('donor_name')
            ->orderByDesc('total_donation')
            ->take(5)
            ->get();

        return view('projects.show', compact('project', 'totalTrees', 'co2AbsorptionPerYear', 'progressPercentage', 'topDonors'));
    }

    public function randomProjectRedirect()
    {
        $project = Project::whereIn('status', ['active'])
                          ->inRandomOrder()
                          ->first();

        if ($project) {
            return redirect()->route('projects.show', $project->slug);
        }

        return redirect()->route('projects.index')->with('info', 'Saat ini belum ada proyek yang membutuhkan donasi.');
    }
}
