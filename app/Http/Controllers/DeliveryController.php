<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('delivery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
