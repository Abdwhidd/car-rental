<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Menampilkan daftar mobil untuk admin
    public function index()
    {
        $cars = Car::orderBy('updated_at', 'desc')->get();
        return view('cars.index', compact('cars'));
    }

    // Menampilkan form tambah mobil untuk admin
    public function create()
    {
        return view('cars.create');
    }

    // Menyimpan data mobil baru untuk admin
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:cars',
            'rental_rate' => 'required|numeric',
        ]);

        $car = Car::create($validatedData);
        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    // Menampilkan form edit mobil untuk admin
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Memperbarui data mobil untuk admin
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255',
            'rental_rate' => 'required|numeric',
        ]);

        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    // Menghapus mobil untuk admin
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
