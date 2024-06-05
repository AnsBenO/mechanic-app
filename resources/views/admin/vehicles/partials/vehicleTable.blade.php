<tbody class="tableBody">

    @foreach ($vehicles as $vehicle)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-900">
            <td class="px-4 py-2 border border-gray-300">{{ $vehicle->id }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $vehicle->make }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $vehicle->model }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $vehicle->fuelType }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $vehicle->registration }}</td>
            <td class="px-4 py-2 flex justify-center gap-3">
                <button onclick="showEditModal({{ $vehicle->id }})"
                    class="btn btn-sm btn-info inline-flex items-center px-3 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-200">
                    <svg class="h-5 w-5 mr-2" xmlns="http://?w/w.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M14.707 4.293a1 1 0 010 1.414L6.414 14.414a1 1 0 01-1.414-1.414L13.293 4.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Edit
                </button>

                <button type="button"
                    class="btn btn-sm btn-danger inline-flex items-center px-3 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-red-200"
                    onclick="showDeleteModal({{ $vehicle->id }})">
                    <svg class="h-5 w-5 mr-2" xmlns="http://?w/w.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 5.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    <tr class="p-11 modal-here">
        {{ $vehicles->links() }}
    </tr>






</tbody>
