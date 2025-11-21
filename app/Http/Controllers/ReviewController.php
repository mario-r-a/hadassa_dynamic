<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan user login (harusnya lewat middleware)
        if (!Auth::check()) {
            return back()->with('error', 'Anda harus login untuk memberikan review.');
        }

        // Cek apakah user sudah pernah membuat review
        $existing = Review::where('user_id', Auth::id())->first();
        if ($existing) {
            return back()->with('error', 'Anda sudah pernah memberikan review.');
        }

        // Validasi input
        $request->validate([
            'content' => 'required|min:10',
            'rating'  => 'required|integer|min:1|max:5',
        ]);

        // Simpan review
        Review::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'rating'  => $request->input('rating'),
        ]);

        return back()->with('success', 'Terima kasih! Review Anda berhasil dikirim.');
    }
}
