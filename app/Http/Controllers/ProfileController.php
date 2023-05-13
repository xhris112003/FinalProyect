<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
            $genero = $user->genero;
        }

        return view('profile')->with([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'genero' => $genero,
        ]);
    }
}
