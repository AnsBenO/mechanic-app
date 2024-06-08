<?php

namespace App\Imports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehiclesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Vehicle([
            'make' => $row['make'],
            'model' => $row['model'],
            'fuelType' => $row['fueltype'],
            'registration' => $row['registration'],
            'photos' => $row['photos'],
            'clientID' => $row['clientid'],
        ]);
    }
}
