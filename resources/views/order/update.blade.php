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
                        <h4 class="">Edit Order</h4>
                        <p class="text-muted font-13 mb-3">Update the order details below.</p>
                        <form method="POST" action="{{ route('order.update', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center align-items-center g-2">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Ali Bin Abu"
                                        required value="{{ $order->user->name }}" readonly>
                                </div>
                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="contact_number"
                                        placeholder="0123456789" required value="{{ $order->user->contact_number }}"
                                        readonly>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 mt-2">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="mohdali23@gmail.com" required value="{{ $order->user->email }}"
                                        readonly>
                                </div>
                                <!-- Order Method -->
                                <div class="col-md-6 mt-2">
                                    <label for="order-method" class="form-label">Order Method<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" required name="order_method" id="order_method"
                                        onchange="toggleAddressForm()">
                                        <option value="Walk in" {{ $order->order_method === 'Walk in' ? 'selected' : '' }}>
                                            Walk in</option>
                                        <option value="Pickup" {{ $order->order_method === 'Pickup' ? 'selected' : '' }}>
                                            Pickup</option>
                                    </select>
                                </div>
                                <div class="col-md-6"></div>
                                <!-- Delivery Option -->
                                <div class="col-md-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delivery_option"
                                            id="delivery_option" value="1"
                                            {{ $order->delivery_option ? 'checked' : '' }} onchange="toggleAddressForm()">
                                        <label class="form-check-label" for="delivery-option">
                                            Please tick if you want delivery option
                                        </label>
                                    </div>
                                </div>
                                <!-- Laundry Type -->
                                <div class="col-md-6 mt-2">
                                    <label for="laundry-type" class="form-label">Laundry Type<span class="text-danger">*</span></label>
                                    <select name="laundry_type_id" id="laundry_type_id" class="form-select form-control"
                                        onchange="filterLaundryServices()">
                                        <option selected disabled>Please Select...</option>
                                        @foreach ($laundryTypes as $type)
                                            <option value="{{ $type->id }}"
                                                {{ $order->laundry_type_id == $type->id ? 'selected' : '' }}>
                                                {{ $type->laundry_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Service -->
                                <div class="col-md-6 mt-2">
                                    <label for="service" class="form-label">Service<span class="text-danger">*</span></label>
                                    <select name="laundry_service_id" id="laundry_service_id"
                                        class="form-select form-control">
                                        <option selected disabled>Please Select...</option>
                                        @foreach ($laundryServices as $service)
                                            <option value="{{ $service->id }}"
                                                data-type="{{ $service->laundry_type_id }}"
                                                {{ $order->laundry_service_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->service_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Address (Visible for Pickup or Delivery Option) -->
                                <div class="col-md-6 mt-2" id="address_form"
                                    style="display: {{ $order->delivery_option || $order->order_method === 'Pickup' ? 'block' : 'none' }};">
                                    <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter address here...">{{ old('address', $order->address) }}</textarea>
                                </div>
                                <!-- Remark -->
                                <div class="col-md-6 mt-2">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark" rows="3" placeholder="Enter any remarks here...">{{ $order->remark }}</textarea>
                                </div>
                                <!-- Pickup Date -->
                                <div class="col-md-6 mt-2" id="pickup_date" style="display: {{ $order->order_method === 'Pickup' ? 'block' : 'none' }};">
                                    <label for="pickup_date" class="form-label">Pickup Date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="pickup_date" id="pickup_date"
                                        class="form-control">
                                </div>
                                <div class="col-md-6"></div>
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

    <script>
        function filterLaundryServices() {
            const selectedTypeId = document.getElementById('laundry_type_id').value;
            const serviceDropdown = document.getElementById('laundry_service_id');
            for (const option of serviceDropdown.options) {
                if (!option.dataset.type || option.dataset.type == selectedTypeId) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }
            serviceDropdown.value = '';
        }

        function toggleAddressForm() {
            const orderMethod = document.getElementById('order_method').value;
            const deliveryOption = document.getElementById('delivery_option').checked;
            const addressForm = document.getElementById('address_form');
            const pickup = document.getElementById('pickup_date');

            addressForm.style.display = (orderMethod === 'Pickup' || deliveryOption) ? 'block' : 'none';
            pickup.style.display = (orderMethod === 'Pickup') ? 'block' : 'none';
        }

        document.getElementById('order_method').addEventListener('change', toggleAddressForm);
        document.getElementById('delivery_option').addEventListener('change', toggleAddressForm);
    </script>
@endsection
