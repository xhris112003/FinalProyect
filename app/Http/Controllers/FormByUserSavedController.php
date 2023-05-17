<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormByUserSaved;


class FormByUserSavedController extends Controller
{
    public function index()
    {
        $forms = FormByUserSaved::all();

        return view('formsSaved', compact('forms'));
    }
}
