@extends('layouts.base')

@section('content')
<div class="container-fluid mt-5">
    <h4 class="header-title">Payment Page</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Order Details</h5>
                    <p><strong>Laundry Type:</strong> {{ $order->laundry_type_name }}</p>
                    <p><strong>Service:</strong> {{ $order->service_name }}</p>
                    <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                    <p><strong>Total Amount:</strong> RM {{ number_format($order->total_amount, 2) }}</p>

                    <form action="{{ route('billing.customer.payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        
                        <div class="form-group">
                            <label for="payment_method">Choose Payment Method:</label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
