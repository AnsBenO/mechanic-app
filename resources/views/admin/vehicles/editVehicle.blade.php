<x-app-layout>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center max-w-lg my-20">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="block text-center mb-4">Edit Vehicle</h2>
            <form >
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <x-input-label for="make" :value="__('Make')" />
                    <x-text-input id="make" class="form-control" type="text" name="make" :value="$vehicle->make" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="model" :value="__('Model')" />
                    <x-text-input id="model" class="form-control" type="text" name="model" :value="$vehicle->model" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="fuelType" :value="__('Fuel Type')" />
                    <x-text-input id="fuelType" class="form-control" type="text" name="fuelType" :value="$vehicle->fuelType" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="registration" :value="__('Registration')" />
                    <x-text-input id="registration" class="form-control" type="text" name="registration" :value="$vehicle->registration" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="photos" :value="__('Photos')" />
                    <input type="file" class="form-control" id="photos" name="photos" />
                </div>
                <x-primary-button>
                    {{ __('Submit') }}
                </x-primary-button>
            </form>
        </div>
    </div>

</x-app-layout>
