<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AboutController extends Controller
{
    public function index()
    {
        // Semua review + user
        $reviews = Review::with('user')->orderByDesc('created_at')->get();

        return view('about', compact('reviews'));
    }
}
