<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('admin.clients.listClients', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.clients.createClient');
    }

    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients')->with('success', 'Client created successfully.');
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function showEdit(Client $client)
    {
        return view('admin.clients.editClient', compact('client'));
    }

    /**
     * Update the specified client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, Client $client)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.listClients')->with('success', 'Client deleted successfully.');
    }
}
