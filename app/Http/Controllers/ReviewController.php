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

        if (Auth::user()->role === 'admin') {
            return back()->with('error', 'Admin tidak dapat membuat review.');
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

    public function delete(Review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $review->delete();

        return back()->with('success', 'Review telah dihapus.');
    }

}
