<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rentals = Rental::where('user_id', auth()->user()->id)
                         ->with('car')
                         ->get();

        return view('dashboard', compact('rentals'));
    }
}
