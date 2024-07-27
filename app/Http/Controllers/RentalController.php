<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {

    $user = auth()->user();

    if ($user->is_admin()) {
        $rentals = Rental::with('user', 'car')->get();
    } else {
        $rentals = Rental::with('user', 'car')
            ->where('user_id', $user->id)
            ->get();
    }

    return view('dashboard', compact('rentals'));
    }

    public function create()
    {
        $user = auth()->user();
        $cars = Car::all();
        return view('rentals.create', compact('user', 'cars'));
    }

    // Menyimpan rental baru ke database
    public function store(Request $request)
{
    $request->validate([
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'total_price' => 'required|numeric',
    ]);

    $car = Car::find($request->car_id);

    if ($car->available == 0) {
        return redirect()->route('rentals.create')->with('error', 'Mobil tidak tersedia.');
    }

    Rental::create([
        'user_id' => auth()->id(),
        'car_id' => $request->car_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'total_price' => $request->total_price,
    ]);

    $car->update(['available' => 0]);

    return redirect()->route('rentals.index')->with('success', 'Rental berhasil dibuat.');
    }


    public function return(Rental $rental)
{
    if ($rental->return) {
        return redirect()->route('rentals.index')->with('success', 'Mobil sudah dikembalikan.');
    }

    try {

        $rental->update(['return' => 1]);

        $rental->car->update(['available' => 1]);

        return redirect()->route('rentals.index')->with('success', 'Mobil berhasil dikembalikan.');
    } catch (\Exception $e) {
        return redirect()->route('rentals.index')->with('error', 'Terjadi kesalahan saat mengembalikan mobil.');
    }
    }



    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rental berhasil dihapus');
    }
}
