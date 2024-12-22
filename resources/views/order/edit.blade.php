@extends('layouts/base')
@section('content')
    <div class="mt-4 text-dark ml-2">
        <a href="{{ route('order.index') }}" class="mdi mdi-chevron-left text-dark"> Back to Order List</a>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Update Order Quantity</h4>
                        <p class="text-muted font-13 mb-3">Staff can only update the quantity for this order.</p>
                        <form method="POST" action="{{ route('order.update-quantity', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ali Bin Abu"
                                        required value="{{ $order->user->name }}" readonly>
                                </div>
                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="contact_number"
                                        placeholder="0123456789" required value="{{ $order->user->contact_number }}"
                                        readonly>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 mt-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="mohdali23@gmail.com" required value="{{ $order->user->email }}"
                                        readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="text" class="form-label">Order Method</label>
                                    <input type="text" class="form-control" name="order_method"
                                        value="{{ $order->order_method }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="text" class="form-label">Laundry Type</label>
                                    <input type="text" class="form-control" name="order_method"
                                        value="{{ $order->laundryType->laundry_name }}" readonly>
                                </div>
                                <!-- Laundry Service -->
                                <div class="col-md-6">
                                    <label for="service" class="form-label">Laundry Service</label>
                                    <input type="text" class="form-control"
                                        value="{{ $order->laundryService->service_name }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="text" class="form-label">Delivery</label>
                                    <input type="text" class="form-control" name="delivery_option"
                                        value="{{ $order->delivery_option ? 'Yes' : 'No' }}" readonly>
                                </div>
                                <!-- Price -->
                                <div class="col-md-6 mt-2">
                                    <label for="price" class="form-label">Price per Unit</label>
                                    <input type="text" id="price" class="form-control"
                                        value="{{ $order->laundryService->price }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="address" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark" rows="3" readonly>{{ $order->remark ?? 'N/A' }}</textarea>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="3" readonly>{{ $order->address ?? 'N/A' }}</textarea>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-6 mt-2">
                                    <label for="quantity" class="form-label">Quantity<span
                                            class="text-danger">*</span></label>
                                    <input type="number" id="quantity" class="form-control" name="quantity"
                                        placeholder="Enter quantity" required min="1"
                                        value="{{ old('quantity', $order->quantity) }}">
                                </div>

                                <!-- Delivery Fee -->
                                <div class="col-md-6 mt-2" id="delivery-fee-container" style="display: none;">
                                    <label for="delivery_fee" class="form-label">Delivery Fee</label>
                                    <input type="number" id="delivery_fee" class="form-control" name="delivery_fee"
                                        placeholder="Enter delivery fee" min="0"
                                        value="{{ old('delivery_fee', $order->delivery_fee ?? 0) }}">
                                </div>

                                <!-- Total Amount -->
                                <div class="col-md-6 mt-2">
                                    <label for="total-amount" class="form-label">Total Amount</label>
                                    <input type="text" id="total-amount" class="form-control"
                                        value="{{ $order->total_amount }}" readonly>
                                </div>
                            </div><!-- end row-->
                            <div class="text-center mt-3">
                                <button type="button" onclick="history.back()" class="btn btn-light mr-3">Back</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div><!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    <!-- JavaScript to Update Total Amount -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const priceInput = document.getElementById('price');
            const deliveryFeeInput = document.getElementById('delivery_fee');
            const totalAmountInput = document.getElementById('total-amount');
            const deliveryFeeContainer = document.getElementById('delivery-fee-container');

            // Determine if the order method requires delivery fee
            const orderMethod = "{{ $order->order_method }}"; // Order method (e.g., 'Pickup', 'Walk-In')
            const delivery = "{{ $order->delivery_option }}"; // This determines if the delivery fee input is shown
            if (delivery == true || orderMethod === 'Pickup') {
                deliveryFeeContainer.style.display = 'block'; // Show the delivery fee input
            }

            // Function to update the total amount
            function updateTotalAmount() {
                const quantity = parseInt(quantityInput.value) || 0; // Default to 0 if invalid input
                const price = parseFloat(priceInput.value) || 0.00; // Default to 0 if invalid input
                const deliveryFee = (delivery == true || orderMethod === 'Pickup') ?
                    parseFloat(deliveryFeeInput.value) || 0.00 // Include delivery fee if applicable
                    :
                    0.00;

                const totalAmount = (quantity * price) + deliveryFee;

                // Update the total amount field
                totalAmountInput.value = totalAmount.toFixed(2); // Format to 2 decimal places
            }

            // Event listeners for inputs
            quantityInput.addEventListener('input', updateTotalAmount);
            if (delivery == true || orderMethod === 'Pickup') {
                deliveryFeeInput.addEventListener('input', updateTotalAmount);
            }

            // Initial calculation if delivery fee is set
            updateTotalAmount();
        });
    </script>
@endsection