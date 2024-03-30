<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Create Vehicle</h1>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('vehicles.store') }}" class="flex flex-col" method="POST">
                                            @csrf
                                            <div class="mb-3 flex flex-col">
                                                <label for="make" class="form-label">Make</label>
                                                <input type="text" class="form-control text-gray-900" id="make" name="make" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="model" class="form-label">Model</label>
                                                <input type="text" class="form-control text-gray-900" id="model" name="model" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="fuelType" class="form-label">Fuel Type</label>
                                                <input type="text" class="form-control text-gray-900" id="fuelType" name="fuelType" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="registration" class="form-label">Registration</label>
                                                <input type="text" class="form-control text-gray-900" id="registration" name="registration" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="photos" class="form-label">Photos</label>
                                                <input type="file" class="form-control text-gray-900" id="photos" name="photos">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
