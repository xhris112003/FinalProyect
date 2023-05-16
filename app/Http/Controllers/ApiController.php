<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function getMovieById($id)
    {
        $response = Http::get('https://api.movies.com/movies/' . $id);

        $movie = $response->json();

        return view('movie-details', compact('movie'));
    }
}
