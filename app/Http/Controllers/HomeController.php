<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',['slot'=>null, 'user' => Auth::user()]);
    }
}
