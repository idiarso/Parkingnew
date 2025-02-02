<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function overview()
    {
        return view('layouts.overview');
    }

    public function sales()
    {
        return view('layouts.sales');
    }

    public function products()
    {
        return view('layouts.products');
    }

    public function customers()
    {
        return view('layouts.customers');
    }
}