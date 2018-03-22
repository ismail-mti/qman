<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionairController extends Controller
{
    function index()
    {
        return view('questionairs.list');
    }
}
