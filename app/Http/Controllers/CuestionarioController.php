<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CuestionarioController extends Controller
{
    public function index(){
        return view('cuestionario');
    }
}
