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
        $activeProjects = Project::where('status', 'active')
            ->withSum(['donations as total_trees' => function ($query) {
                $query->where('status', 'paid');
            }], 'tree_quantity')
            ->latest()
            ->get();

        $completedProjects = Project::where('status', 'completed')
            ->withSum(['donations as total_trees' => function ($query) {
                $query->where('status', 'paid');
            }], 'tree_quantity')
            ->latest()
            ->get();

        $pendingProjects = Project::where('status', 'pending')
            ->withSum(['donations as total_trees' => function ($query) {
                $query->where('status', 'paid');
            }], 'tree_quantity')
            ->latest()
            ->get();

        return view('projects.index', compact(
            'activeProjects',
            'completedProjects',
            'pendingProjects'
        ));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->with(['projectUpdates' => function ($query) {
                $query->latest();
            }])
            ->firstOrFail();

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
}
