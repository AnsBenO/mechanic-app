<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        return view('admin.vehicles.listVehicles', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.vehicles.createVehicle');
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable',
            'clientID' => 'required|exists:clients,id',
        ]);

        Vehicle::create($validatedData);

        return redirect()->route('admin.vehicles.listVehicles')->with('success', 'Vehicle created successfully.');
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function showEdit(Vehicle $vehicle)
    {
        return view('admin.vehicles.editVehicle', compact('vehicle'));
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, Vehicle $vehicle)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable',
            'clientID' => 'required|exists:clients,id',
        ]);

        $vehicle->update($validatedData);

        return redirect()->route('admin.vehicles.listVehicles')->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  \App\Models\Vehicle  
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('admin.vehicles.listVehicles')->with('success', 'vehicle deleted successfully.');
    }
}
