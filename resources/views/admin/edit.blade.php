<x-guest-layout>
    <form method="POST" action="{{ route('cars.update', $car->id) }}">
        @csrf
        @method('PUT')

        <!-- Brand -->
        <div>
            <x-input-label for="brand" :value="__('Brand')" />
            <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand', $car->brand)" required autofocus autocomplete="brand" />
            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
        </div>

        <!-- Model -->
        <div class="mt-4">
            <x-input-label for="model" :value="__('Model')" />
            <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model', $car->model)" required autocomplete="model" />
            <x-input-error :messages="$errors->get('model')" class="mt-2" />
        </div>

        <!-- License Plate -->
        <div class="mt-4">
            <x-input-label for="license_plate" :value="__('License Plate')" />
            <x-text-input id="license_plate" class="block mt-1 w-full" type="text" name="license_plate" :value="old('license_plate', $car->license_plate)" required autocomplete="license_plate" />
            <x-input-error :messages="$errors->get('license_plate')" class="mt-2" />
        </div>

        <!-- Rental Rate -->
        <div class="mt-4">
            <x-input-label for="rental_rate" :value="__('Rental Rate')" />
            <x-text-input id="rental_rate" class="block mt-1 w-full" type="text" name="rental_rate" :value="old('rental_rate', $car->rental_rate)" required autocomplete="rental_rate" />
            <x-input-error :messages="$errors->get('rental_rate')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.dashboard') }}">
                {{ __('Cancel') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Save Changes') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
