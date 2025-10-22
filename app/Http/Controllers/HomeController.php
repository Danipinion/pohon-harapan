<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Donation;

class HomeController extends Controller
{
    public function index()
    {
        $activeProjects = Project::where('status', 'active')->latest()->take(3)->get();

        $completedProjects = Project::where('status', 'completed')->latest()->take(3)->get();

        $pendingProjects = Project::where('status', 'pending')->latest()->take(3)->get();

        $totalTreesPlanted = Donation::where('status', 'paid')->sum('tree_quantity');

        $totalDonors = Donation::where('status', 'paid')->distinct('donor_name')->count();

        return view('home', compact('activeProjects', 'totalTreesPlanted', 'totalDonors', 'completedProjects', 'pendingProjects'));
    }

    public function about()
    {
        return view('about');
    }
}
