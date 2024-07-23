<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        $serviceProviders = ServiceProvider::all();
        return view('auth.register', compact('serviceProviders'));
    }
}

