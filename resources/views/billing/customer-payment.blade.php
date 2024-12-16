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
                        
                        <!-- Payment Method -->
                        <div class="form-group">
                            <label for="payment_method">Choose Payment Method:</label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Online Banking</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>

                        <!-- Bank Selection (Hidden by Default) -->
                        <div class="form-group" id="bank-selection" style="display: none;">
                            <label for="bank_name">Choose Your Bank:</label>
                            <select name="bank_name" id="bank_name" class="form-control">
                                <option value="bank1">Maybank</option>
                                <option value="bank2">CIMB Bank</option>
                                <option value="bank3">RHB Bank</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Toggle Bank Selection -->
<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        const paymentMethod = this.value;
        const bankSelection = document.getElementById('bank-selection');

        if (paymentMethod === 'bank_transfer') {
            bankSelection.style.display = 'block';
        } else {
            bankSelection.style.display = 'none';
        }
    });
</script>
@endsection
