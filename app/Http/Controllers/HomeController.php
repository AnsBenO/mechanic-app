<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Repair;
use App\Models\SparePart;
use App\Models\User;
use App\Models\Vehicle;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    private $domPDF;

    public function __construct(DomPDFPDF $domPDF)
    {
        $this->domPDF = $domPDF;
    }

    public function index()
    {
        if (Auth::id()) {
            $role = Auth::user()->role;
            if ($role == "admin") {
                return $this->adminHome();
            } else if ($role == "user") {
                return view("dashboard");
            } else {
                return redirect()->back();
            }
        }
    }

    private function adminHome()
    {
        $usersNumber = User::count();
        $vehiclesNumber = Vehicle::count();
        $partsNumber = SparePart::count();
        $reparationsNumber = Repair::count();
        $invoicesNumber = Invoice::count();

        $chart = [
            'clients' => $usersNumber,
            'vehicles' => $vehiclesNumber,
            'parts' => $partsNumber,
            'reparations' => $reparationsNumber,
            'invoices' => $invoicesNumber,
        ];

        $data = [
            'usersNumber' => $usersNumber,
            'vehiclesNumber' => $vehiclesNumber,
            'partsNumber' => $partsNumber,
            'reparationsNumber' => $reparationsNumber,
            'invoicesNumber' => $invoicesNumber,
            'chart' => $chart,
        ];

        return view("admin.adminHome", compact(
            'usersNumber',
            'vehiclesNumber',
            'partsNumber',
            'reparationsNumber',
            'invoicesNumber',
            'chart'
        ));
    }

    public function generatePdf(Request $request)
    {
        $data = $this->getData($request);

        // Ensure the data URLs are properly formatted for embedding in HTML
        if (!empty($data['chart1']) && !str_starts_with($data['chart1'], 'data:image/png;base64,')) {
            $data['chart1'] = 'data:image/png;base64,' . $data['chart1'];
        }

        if (!empty($data['chart2']) && !str_starts_with($data['chart2'], 'data:image/png;base64,')) {
            $data['chart2'] = 'data:image/png;base64,' . $data['chart2'];
        }

        $pdf = $this->domPDF->loadView('admin.stats.pdfStats', $data);
        return $pdf->download('statistics.pdf');
    }

    private function getData(Request $request)
    {
        $usersNumber = User::count();
        $vehiclesNumber = Vehicle::count();
        $partsNumber = SparePart::count();
        $reparationsNumber = Repair::count();
        $invoicesNumber = Invoice::count();

        $chart1 = $request->input('chart1');
        $chart2 = $request->input('chart2');

        return [
            'usersNumber' => $usersNumber,
            'vehiclesNumber' => $vehiclesNumber,
            'partsNumber' => $partsNumber,
            'reparationsNumber' => $reparationsNumber,
            'invoicesNumber' => $invoicesNumber,
            'chart1' => $chart1,
            'chart2' => $chart2,
        ];
    }
}
