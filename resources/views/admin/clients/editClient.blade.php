<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Edit Client</h1>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="flex flex-col" >
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3 flex flex-col">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control text-gray-900 " id="firstName" name="firstName" value="{{ $client->firstName }}" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control text-gray-900 " id="lastName" name="lastName" value="{{ $client->lastName }}" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control text-gray-900 " id="address" name="address" value="{{ $client->address }}" required>
                                            </div>
                                            <div class="mb-3 flex flex-col">
                                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control text-gray-900 " id="phoneNumber" name="phoneNumber" value="{{ $client->phoneNumber }}" required>
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
