<x-app-layout>

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center max-w-lg my-20">                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="block text-center mb-4">Create Client</h1>
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="firstName" :value="__('First Name')" />
                            <x-text-input id="firstName" class="form-control" type="text" name="firstName" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="lastName" :value="__('Last Name')" />
                            <x-text-input id="lastName" class="form-control" type="text" name="lastName" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="form-control" type="text" name="address" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                            <x-text-input id="phoneNumber" class="form-control" type="text" name="phoneNumber" required />
                        </div>
                        <x-primary-button>
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>

</x-app-layout>
