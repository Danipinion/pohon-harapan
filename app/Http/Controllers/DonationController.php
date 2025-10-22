<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric|min:10000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);


        $project = Project::findOrFail($request->project_id);
        $treeQuantity = floor($request->amount / $project->cost_per_tree);

        $uniqueAmount = $request->amount + rand(100, 999);


        $donation = Donation::create([
            'user_id' => null,
            'project_id' => $request->project_id,
            'donor_name' => $request->name,
            'donor_email' => $request->email,
            'amount' => $uniqueAmount,
            'tree_quantity' => $treeQuantity,
            'status' => 'pending',
        ]);

        return redirect()->route('donations.instructions', $donation->id)
            ->with('success', 'Data donasi berhasil dibuat. Silakan selesaikan pembayaran.');
    }

    public function checkout(Donation $donation)
    {
        return view('donations.checkout', compact('donation'));
    }

    public function instructions(Donation $donation)
    {
        if ($donation->status !== 'pending') {
            return redirect('/')->with('error', 'Halaman ini sudah tidak valid.');
        }
        return view('donations.instructions', compact('donation'));
    }

    public function uploadProof(Request $request, Donation $donation)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('proofs', 'public');
            $donation->update(['payment_proof' => $path]);
        }

        return redirect()->route('donations.instructions', $donation->id)
            ->with('success', 'Bukti pembayaran berhasil diunggah. Donasi Anda akan segera kami verifikasi.');
    }
}
