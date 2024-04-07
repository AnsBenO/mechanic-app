<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Manage Clients</h1>
                    <p><a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client</a></p>
                    @if ($clients->isEmpty())
                        <p>No clients found.</p>
                    @else
                        <table class="table min-w-full">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->firstName }}</td>
                                        <td>{{ $client->lastName }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->phoneNumber }}</td>
                                        <td>
                                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-info">Edit</a>                                            
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
