<x-guest-layout>
    <form method="POST" action="{{ route('rentals.store') }}">
        @csrf

        <!-- User (Logged in user) -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <!-- Car -->
        <div class="mt-4">
            <x-input-label for="car_id" :value="__('Car')" />
            <select id="car_id" name="car_id" class="block mt-1 w-full" required>
                <option value="">{{ __('Select a car') }}</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>{{ $car->brand }} - {{ $car->model }} - {{ $car->license_plate }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
        </div>

        <!-- Start Date -->
        <div class="mt-4">
            <x-input-label for="start_date" :value="__('Start Date')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

        <!-- End Date -->
        <div class="mt-4">
            <x-input-label for="end_date" :value="__('End Date')" />
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>

        <!-- Total Price (Calculated Automatically) -->
        <div class="mt-4">
            <x-input-label for="total_price" :value="__('Total Price')" />
            <x-text-input id="total_price" class="block mt-1 w-full" type="text" name="total_price" :value="old('total_price')" readonly />
            <x-input-error :messages="$errors->get('total_price')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('dashboard') }}">
                {{ __('Cancel') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Add Rental') }}
            </x-primary-button>
        </div>
    </form>

    <script>

        document.getElementById('end_date').addEventListener('change', function() {
            const startDate = new Date(document.getElementById('start_date').value);
            const endDate = new Date(this.value);
            const timeDifference = endDate - startDate;
            const daysDifference = timeDifference / (1000 * 3600 * 24);
            const carId = document.getElementById('car_id').value;

            if (carId && daysDifference >= 0) {
                const selectedCar = @json($cars).find(car => car.id == carId);
                const totalPrice = daysDifference * selectedCar.rental_rate;
                document.getElementById('total_price').value = totalPrice.toFixed(2);
            } else {
                document.getElementById('total_price').value = '';
            }
        });

        document.getElementById('car_id').addEventListener('change', function() {
            document.getElementById('end_date').dispatchEvent(new Event('change'));
        });

        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->has('car_id'))
                alert('Mobil tidak tersedia.');
            @endif
        });
    </script>
</x-guest-layout>
