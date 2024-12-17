<?php

use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingPaymentController;
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

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    /*Manage Laundry Type and Services*/
    Route::resource('laundry', LaundryController::class);

    /*Manage Order*/
    Route::resource('order', OrderController::class);

    /*Manage Pickup & Delivery*/
    Route::resource('delivery', DeliveryController::class);
    Route::get('/delivery/create/{id}', [DeliveryController::class, 'AssignPickupDriver'])->name('delivery.create');
    Route::get('/delivery/proof-pickup/{id}', [DeliveryController::class, 'EditProofPickup'])->name('delivery.editPickup');
    Route::put('/delivery/proof-pickup/{id}', [DeliveryController::class, 'ProofPickup'])->name('delivery-proof.pickup');
    Route::get('/delivery/proof-deliver/{id}', [DeliveryController::class, 'EditProofDeliver'])->name('delivery.editDeliver');
    Route::put('/delivery/proof-deliver/{id}', [DeliveryController::class, 'ProofDeliver'])->name('delivery-proof.deliver');


    /* Billing and Payment Page */
    Route::get('/billing-payment', [BillingPaymentController::class, 'index'])->name('billing-payment.index');
    Route::get('/sales-details/{month}/{year}', [BillingPaymentController::class, 'salesDetails'])->name('sales.details');
    Route::get('/customer-orders', [BillingPaymentController::class, 'customerOrders'])->name('billing.customer.orders');
    Route::post('/pay-order/{id}', [BillingPaymentController::class, 'payOrder'])->name('billing.customer.pay');;
    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');*/
});

require __DIR__ . '/auth.php';
