<?php

use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingPaymentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ChemicalOrderController;

use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard',[UserController::class,'index'])->name('dashboard');

    /*Manage Laundry Type and Services*/
    Route::resource('laundry',LaundryController::class);

    /*Manage Order*/
    Route::resource('order', OrderController::class);

    /*Manage Pickup & Delivery*/
    Route::resource('delivery', DeliveryController::class);

        /* Billing and Payment Page */
        Route::get('/billing-payment', [BillingPaymentController::class, 'index'])->name('billing-payment.index');
        Route::get('/sales-details/{month}/{year}', [BillingPaymentController::class, 'salesDetails'])->name('sales.details');

         /*Manage Inventory and Stock*/
    Route::resource('inventory', InventoryController::class);
    /*Button show all order */
    Route::get('/inventory/purchase', [InventoryController::class, 'purchase'])->name('inventory.purchase');
    /*Route::delete('/chemical-orders/{id}', [InventoryController::class, 'destroy'])->name('chemical-orders.destroy');*/

    Route::get('inventory/{inventory}/buy', [InventoryController::class, 'buy'])->name('inventory.buychemical');
    // Route to handle the chemical order form submission
Route::post('chemical-orders', [ChemicalOrderController::class, 'store'])->name('chemical-orders.store');
// Route for deleting chemical order
Route::delete('/chemical-orders/{chemicalOrder}', [ChemicalOrderController::class, 'destroy'])->name('chemical-orders.destroy');
        


;
    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');*/
});

require __DIR__.'/auth.php';
