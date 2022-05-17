<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function checkout()
    {
        return view('checkout');
    }

    public function success()
    {
        return view('success');
    }

    public function orders()
    {
        return view('orders');
    }
}
