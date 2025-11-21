<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminReviewController extends Controller
{
    /**
     * Tampilkan daftar semua review untuk admin (read-only).
     */
    public function index(Request $request)
    {
        // simple pagination, include related user
        $reviews = Review::with('user')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.reviews', compact('reviews'));
    }
}