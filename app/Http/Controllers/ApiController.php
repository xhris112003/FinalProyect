<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getMovieById($id)
    {
        $response = Http::get('https://api.movies.com/movies/' . $id);

        $movie = $response->json();

        return view('movie-details', compact('movie'));
    }
}
