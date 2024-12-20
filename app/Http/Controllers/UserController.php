<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function index()
  {
    $user = auth()->user();

      // Check if this user has already dismissed the tutorial
      $showTutorial = !$user->has_seen_schedule_tutorial;

      // Total orders for today
      $orderToday = Order::whereDate('created_at', Carbon::today())
                          ->count();
  
      // Overdue Jobs (orders with status 'Pending' and created before today)
      $overdueJobs = Order::where('status', 'Pending')
                          ->whereDate('created_at', '<', Carbon::today())
                          ->count();
  
      // This month's sales (sum total_amount for the current month)
      $thisMonthSales = Order::whereMonth('created_at', Carbon::now()->month)
                              ->whereYear('created_at', Carbon::now()->year)
                              ->sum('total_amount');
  
      // This year's sales (sum total_amount for the current year)
      $thisYearSales = Order::whereYear('created_at', Carbon::now()->year)
                            ->sum('total_amount');
  
      // Fetch orders with their user, guest, and service details
      $orders = Order::with(['user', 'guest', 'laundryService'])->get();
  
      // Pass variables to the view
      return view('dashboard', compact('showTutorial','orderToday', 'overdueJobs', 'thisMonthSales', 'thisYearSales', 'orders'));
  }
  

    // Delete an order
    public function destroy($id)
    {
        // Find the order
        $order = Order::find($id);

        if ($order) {
            $order->delete();
            return redirect()->route('dashboard')->with('success', 'Order deleted successfully!');
        }

        return redirect()->route('customers.index')->with('error', 'Order not found!');
    }

    public function dismissScheduleTutorial()
    {
        $user = auth()->user();

        if ($user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['has_seen_schedule_tutorial' => true]);

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'User not authenticated'], 401);
    }



}
