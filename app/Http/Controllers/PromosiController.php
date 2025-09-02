<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromosiController extends Controller
{
    /**
     * Display the promotions page for public users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.promosi');
    }
}