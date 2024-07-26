@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Flex container to align the title and button -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Daftar Mobil</h1>
        <!-- Tombol Add Car -->
        <a href="{{ route('cars.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Add Car
        </a>
    </div>

    <div class="overflow-x-auto mb-4">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 text-left">Brand</th>
                    <th class="px-4 py-2 text-left">Model</th>
                    <th class="px-4 py-2 text-left">License Plate</th>
                    <th class="px-4 py-2 text-left">Rental Rate</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $car->brand }}</td>
                        <td class="px-4 py-2">{{ $car->model }}</td>
                        <td class="px-4 py-2">{{ $car->license_plate }}</td>
                        <td class="px-4 py-2">{{ $car->rental_rate }}</td>
                        <td class="px-4 py-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('cars.edit', $car->id) }}" class="text-blue-500 hover:underline">Edit</a>

                            <!-- Tombol Delete -->
                            <button type="button" onclick="openDeleteModal({{ $car->id }})" class="text-red-500 hover:underline ml-4">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm mx-auto">
            <h3 class="text-lg font-semibold mb-4">Confirm Delete</h3>
            <p class="mb-4">Are you sure you want to delete this item?</p>
            <div class="flex justify-end">
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="closeDeleteModal()">
                    Cancel
                </button>
                <form id="delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(carId) {
            document.getElementById('delete-form').action = `/cars/${carId}`;
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }
    </script>
</div>
@endsection
