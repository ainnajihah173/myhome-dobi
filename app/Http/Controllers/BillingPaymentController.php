<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingPaymentController extends Controller
{
    

    public function index()
    {
        return view('billing.billing-payment'); // Updated to reflect the nested directory
    }

}
