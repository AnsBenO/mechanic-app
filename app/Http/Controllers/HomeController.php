<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == "admin") {
                return view("admin.adminHome");
            } else if ($role == "user") {
                return view("dashboard");
            } else {
                redirect()->back();
            }
        }
    }
}
