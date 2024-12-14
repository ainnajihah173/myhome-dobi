<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingPaymentController extends Controller
{
    // Main page for billing and payment
    public function index()
    {
        // Calculate sales summary
        $currentMonth = now()->month;
        $currentYear = now()->year;
    
        $salesSummary = [
            'thisMonth' => DB::table('orders')
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->sum('total_amount'),
            'thisYear' => DB::table('orders')
                ->whereYear('created_at', $currentYear)
                ->sum('total_amount'),
            'total' => DB::table('orders')->sum('total_amount'),
        ];
    
        // Calculate monthly sales data for chart
        $monthlySales = DB::table('orders')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_amount) as total_sales')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->pluck('total_sales', 'month'); // Retrieve data as key-value pairs
    
        $salesData = array_fill(1, 12, 0); // Initialize array with 12 months set to 0
        foreach ($monthlySales as $month => $total) {
            $salesData[$month] = $total;
        }
    
        // Calculate sales list for table
        $sales = DB::table('orders')
    ->select(
        DB::raw('CAST(MONTH(created_at) AS UNSIGNED) as month'),
        DB::raw('YEAR(created_at) as year'),
        DB::raw('SUM(total_amount) as total_sales')
    )
    ->whereNotNull('created_at') // Exclude rows with NULL created_at
    ->groupBy('month', 'year')
    ->orderBy('year', 'desc')
    ->orderBy('month', 'asc')
    ->get();

    
        // Pass data to the view
        return view('billing.billing-payment', compact('salesSummary', 'salesData', 'sales'));
    }
    

    // Detailed sales report for a specific month and year
    public function salesDetails($month, $year)
    {
        // Fetch the sales details for the given month and year
        $salesDetails = DB::table('orders')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();

        // Pass the sales details to the view
        return view('billing.sales-details', compact('salesDetails', 'month', 'year'));
    }

    public function customerOrders()
{
    $customerId = auth()->user()->id; // Get the logged-in customer's ID

    // Fetch orders for the logged-in customer
    $orders = DB::table('orders')
        ->where('user_id', $customerId)
        ->where('status', 'Pending') // Show only unpaid orders
        ->orderBy('created_at', 'desc')
        ->get();

    return view('billing.customer-orders', compact('orders'));
}

public function payOrder(Request $request, $id)
{
    // Mark the order as paid
    DB::table('orders')
        ->where('id', $id)
        ->update(['status' => 'Pay']);

    return redirect()->route('billing.customer.orders')->with('success', 'Order has been paid successfully.');
}

}



