<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Guest;
use App\Models\LaundryService;
use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $deliverys = Delivery::with('orders')->get();
        return view('delivery.index', compact('deliverys', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AssignPickupDriver($id)
    {
        $orders = Order::findOrFail($id);
        $users = User::whereHas('staff', function ($query) {
            $query->where('role', 'Pickup & Delivery Driver');
        })->get();
        
        return view('delivery.create', compact('orders', 'users'));
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
