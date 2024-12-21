<?php

use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingPaymentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ScheduleController;

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
    Route::delete('/dashboard/{id}', [UserController::class, 'destroy'])->name('customers.destroy');
    Route::post('/dismiss-schedule-tutorial', [UserController::class, 'dismissScheduleTutorial'])->name('dismiss.schedule.tutorial');


    // Manage Staff
    Route::resource('staff', StaffController::class);
    // In routes/web.php
    Route::get('/profile', [StaffController::class, 'profile'])->name('profile');
    // Route for updating the entire profile
    Route::put('/profile/update', [StaffController::class, 'updateProfile'])->name('profile.update');

    //Manage Schedule
    Route::resource('schedule', ScheduleController::class);
    Route::get('/api/staff', [ScheduleController::class, 'getAllStaff']);
    Route::get('/api/schedules', [ScheduleController::class, 'getSchedules']); // Fetch schedules for calendar
    
    // Manage Laundry Type and Services
    Route::resource('laundry', LaundryController::class);

    // Manage Order
    Route::resource('order', OrderController::class);
    Route::patch('/order/{id}/update-status', [OrderController::class, 'updateStatus'])->name('order.update-status');


    // Manage Pickup & Delivery
    Route::resource('delivery', DeliveryController::class);
    Route::get('/delivery/create/{id}', [DeliveryController::class, 'AssignPickupDriver'])->name('delivery.create');
    Route::get('/delivery/proof-pickup/{id}', [DeliveryController::class, 'EditProofPickup'])->name('delivery.editPickup');
    Route::put('/delivery/proof-pickup/{id}', [DeliveryController::class, 'ProofPickup'])->name('delivery-proof.pickup');
    Route::get('/delivery/proof-deliver/{id}', [DeliveryController::class, 'EditProofDeliver'])->name('delivery.editDeliver');
    Route::put('/delivery/proof-deliver/{id}', [DeliveryController::class, 'ProofDeliver'])->name('delivery-proof.deliver');

    /* Billing and Payment Page */
    Route::get('/billing-payment', [BillingPaymentController::class, 'index'])->name('billing-payment.index');
    Route::get('/sales-details/{month}/{year}', [BillingPaymentController::class, 'salesDetails'])->name('sales.details');
    Route::get('/customer-payment-page/{order_id}', [BillingPaymentController::class, 'customerPaymentPage'])->name('billing.customer.payment.page');
    Route::post('/billing/customer/payment', [BillingPaymentController::class, 'payOrder'])->name('billing.customer.payment');
    Route::get('/billing/invoice/{orderId}', [BillingPaymentController::class, 'generateInvoice'])->name('billing.invoice');

    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');*/
});

require __DIR__.'/auth.php';
