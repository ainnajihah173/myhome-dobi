<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Guest;
use App\Models\LaundryService;
use App\Models\LaundryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'Customer') {
            // Get the authenticated user's ID
            $userId = auth()->user()->id;
            // Retrieve orders belonging to the authenticated customer
            $orders = Order::with(['user', 'laundryService', 'laundryType'])
                ->where('user_id', $userId)
                ->get();
        } else {

            $orders = Order::all();
        }
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role === 'Customer') {
            $users = User::where('id', auth()->user()->id)->first();
            $laundryServices = LaundryService::all();
            $laundryTypes = LaundryType::all();
            return view('order.create', compact('users', 'laundryServices', 'laundryTypes'));
        } else {
            $laundryServices = LaundryService::all();
            $laundryTypes = LaundryType::all();
            return view('order.create', compact('laundryServices', 'laundryTypes'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        /*$request->validate([
            'order_method' => 'required|in:Walk in,Pickup',
            'laundry_type_id' => 'required|exists:laundry_types,id',
            'laundry_service_id' => 'required|exists:laundry_services,id',
            'remark' => 'nullable|string',
            'delivery_option' => 'nullable|boolean',
            'address' => 'required_if:delivery_option,true',
            'name' => 'required_if:guest,true|string|max:255',
            'email' => 'nullable|email|max:255',
            'contact_number' => 'required_if:guest,true|string|max:15',
        ]);*/

    // Fetch the price of the selected laundry service
    $service = DB::table('laundry_services')
        ->where('id', $request->laundry_service_id)
        ->first();

    if (!$service) {
        return back()->withErrors('Invalid laundry service selected.');
    }

    // Calculate delivery fee
    $deliveryFee = $request->delivery_option ? 10.00 : 0.00; // RM 10 for delivery

    // Calculate total amount
    $quantity = $request->quantity;
    $totalAmount = ($service->price * $quantity) + $deliveryFee;

    // Create a new order instance
    $order = new Order();

    if (auth()->check() && auth()->user()->role === 'Customer') {
        $order->user_id = auth()->user()->id; // Registered user
    } else {
        // Guest user logic
        $guest = Guest::firstOrCreate(
            ['contact_number' => $request->contact_number],
            ['name' => $request->name, 'email' => $request->email]
        );
        $order->guest_id = $guest->id;
    }

    // Set order attributes
    $order->order_method = $request->order_method;
    $order->laundry_type_id = $request->laundry_type_id;
    $order->laundry_service_id = $request->laundry_service_id;
    $order->quantity = $quantity;
    $order->delivery_fee = $deliveryFee;
    $order->total_amount = $totalAmount;
    $order->remark = $request->remark;
    $order->delivery_option = $request->delivery_option ?? false;
    $order->address = $request->delivery_option ? $request->address : null;

    // Save the order
    $order->save();

    // Redirect with success message
    return redirect()->route('order.index')->with('success', 'Order created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the order with its related data
        $order = Order::with(['user', 'guest', 'laundryService', 'laundryType'])
            ->findOrFail($id);

        // Pass the order data to the view
        return view('order.show', compact('order'));
    }

    // Show the edit page
    public function edit($id)
    {
        $order = Order::findOrFail($id); // Fetch the order by ID
        $laundryTypes = LaundryType::all(); // Fetch laundry types
        $laundryServices = LaundryService::all(); // Fetch laundry services

        return view('order.update', compact('order', 'laundryTypes', 'laundryServices'));
    }

    // Update the order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'order_method' => 'required|string',
            'delivery_option' => 'nullable|boolean',
            'laundry_type_id' => 'required|exists:laundry_types,id',
            'laundry_service_id' => 'required|exists:laundry_services,id',
            'address' => 'nullable|string|max:500',
            'remark' => 'nullable|string|max:500',
        ]);

        // Update the order fields
        $order->order_method = $validatedData['order_method'];
        $order->delivery_option = $request->has('delivery_option') ? 1 : 0;
        $order->laundry_type_id = $validatedData['laundry_type_id'];
        $order->laundry_service_id = $validatedData['laundry_service_id'];
        $order->address = $validatedData['address'] ?? null;
        $order->remark = $validatedData['remark'] ?? null;

        $order->save(); // Save the updated order

        return redirect()->route('order.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function updateStatus($id)
{
    // Find the order
    $order = Order::find($id);

    if (!$order) {
        return redirect()->route('order.index')->withErrors('Order not found.');
    }

    // Check the current status
    if ($order->status === 'Pending' || $order->status === 'In Work') {
        // Update the status to "Pay"
        $order->status = 'Pay';
        $order->save();

        return redirect()->route('order.index')->with('success', 'Order status updated to Pay.');
    }

    // Return with an error if the status cannot be updated
    return redirect()->route('order.index')->withErrors('Order status cannot be updated.');
}

}
