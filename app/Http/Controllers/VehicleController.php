<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.vehicles.listVehicles');
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
     * Remove the specified vehicle from storage.
     *
     * @param  int  $vehicleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);

        $vehicle->delete();
    }

    /**
     * Show the modal for removing a vehicle.
     *
     * @param int $vehicleId
     * @return \Illuminate\View\View
     */
    public function showDelete($vehicleId)
    {
        return view('admin.modals.deleteVehicle', compact('vehicleId'));
    }

    /**
     * Search for vehicles based on their make, model, fuel type or registration.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $output = '';
        $query = $request->input('query');

        $vehicles = Vehicle::where('make', 'like', "%$query%")
            ->orWhere('model', 'like', "%$query%")
            ->orWhere('fuelType', 'like', "%$query%")
            ->orWhere('registration', 'like', "%$query%")
            ->paginate(10);


        $total_rows = (int) $vehicles->count();
        if ($total_rows > 0) {
        } else {
            $output = '
                <tr>
                    <td align="center" >No Data Found</td>
                </tr>
            ';
        }



        return response()->json([
            'html' => view('admin.vehicles.partials.vehicleTable', compact('vehicles'))->render(),
            'pagination' => (string) $vehicles->links()
        ]);
    }
}
