<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    
    public function like($movie)
    {
        $user = Auth::user();
        $like = new Like();
        $like->user_id = $user->id;
        $like->movie_id = $movie->id;
        $like->save();

        return redirect()->back()->with('success', '¡Has dado like a la película!');
}
}
