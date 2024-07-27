@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Tampilkan Judul -->
                    <h2 class="text-xl font-semibold">{{ __("Rental") }}</h2>

                    <!-- Tampilkan pesan sukses atau error jika ada -->
                    @if(session('success'))
                        <div id="alert-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @elseif(session('error'))
                        <div id="alert-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <!-- Tampilkan tombol "Tambah Rental" hanya untuk pengguna non-admin -->
                    @if(Auth::user()->is_user())
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('rentals.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Tambah Rental
                            </a>
                        </div>
                    @endif

                    <!-- Tampilkan Data Rental -->
                    <div class="overflow-x-auto mb-4">
                        @if($rentals->isEmpty())
                            <p class="text-center text-gray-500">Belum ada rental.</p>
                        @else
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-gray-100 border-b">
                                        <th class="px-4 py-2 text-left">User</th>
                                        <th class="px-4 py-2 text-left">Mobil</th>
                                        <th class="px-4 py-2 text-left">Tanggal Mulai</th>
                                        <th class="px-4 py-2 text-left">Tanggal Selesai</th>
                                        <th class="px-4 py-2 text-left">Total Harga</th>
                                        <th class="px-4 py-2 text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rentals as $rental)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $rental->user->name }}</td>
                                            <td class="px-4 py-2">{{ $rental->car->brand }}</td>
                                            <td class="px-4 py-2">{{ $rental->start_date }}</td>
                                            <td class="px-4 py-2">{{ $rental->end_date }}</td>
                                            <td class="px-4 py-2">{{ $rental->total_price }}</td>
                                            <td class="px-4 py-2">
                                                @if(Auth::user()->is_admin())
                                                    <!-- Admin hanya melihat status -->
                                                    {{ $rental->return ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}
                                                @elseif(Auth::user()->is_user() && $rental->user_id == Auth::id())
                                                    <!-- Pengguna biasa melihat status dan tombol jika belum dikembalikan -->
                                                    @if($rental->return)
                                                        {{ 'Sudah Dikembalikan' }}
                                                    @else
                                                        <form action="{{ route('rentals.return', $rental->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="text-green-500 hover:underline">
                                                                Kembalikan
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk menampilkan popup alert -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            if (document.getElementById('alert-success')) {
                setTimeout(() => {
                    document.getElementById('alert-success').style.display = 'none';
                }, 5000); // Sembunyikan alert setelah 5 detik
            }

            if (document.getElementById('alert-error')) {
                setTimeout(() => {
                    document.getElementById('alert-error').style.display = 'none';
                }, 5000); // Sembunyikan alert setelah 5 detik
            }
        });
    </script>
@endsection
