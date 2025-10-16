<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

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
            'user_id' => auth()->id() ?? null,
            'project_id' => $request->project_id,
            'donor_name' => $request->name,
            'donor_email' => $request->email,
            'amount' => $uniqueAmount,
            'tree_quantity' => $treeQuantity,
            'status' => 'pending',
        ]);

        // Alihkan ke halaman instruksi pembayaran, bukan checkout
        return redirect()->route('donations.instructions', $donation->id)
            ->with('success', 'Data donasi berhasil dibuat. Silakan selesaikan pembayaran.');
    }

    public function checkout(Donation $donation)
    {
        return view('donations.checkout', compact('donation'));
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $orderId = $payload['order_id'];
        $statusCode = $payload['status_code'];
        $grossAmount = $payload['gross_amount'];
        $signatureKey = hash('sha512', $orderId . $statusCode . $grossAmount . config('services.midtrans.server_key'));

        if ($payload['signature_key'] !== $signatureKey) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $donationId = explode('-', $orderId)[1];
        $donation = Donation::findOrFail($donationId);

        if ($payload['transaction_status'] == 'capture' || $payload['transaction_status'] == 'settlement') {
            $donation->update(['status' => 'paid']);
        } elseif ($payload['transaction_status'] == 'expire' || $payload['transaction_status'] == 'cancel' || $payload['transaction_status'] == 'deny') {
            $donation->update(['status' => 'failed']);
        }

        return response()->json(['message' => 'Webhook received successfully']);
    }

    public function instructions(Donation $donation)
    {
        // Pastikan hanya donasi yang pending yang bisa diakses
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
