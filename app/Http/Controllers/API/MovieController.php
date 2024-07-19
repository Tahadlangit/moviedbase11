<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::with('genres', 'ratings.rater')->get();

        return response()->json([
            'status' => 'success',
            'data' => $movies,
        ]);
    }

    public function show($id)
    {
        $movie = Movie::with('genres', 'ratings.rater')->find($id);

        if (!$movie) {
            return response()->json([
                'status' => 'error',
                'message' => 'Movie not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $movie,
        ]);
    }
}