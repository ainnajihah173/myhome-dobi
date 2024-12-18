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
                        <h4 class="">New Order</h4>
                        <p class="text-muted font-13 mb-4">
                            Write your new order here. We are ready to serve!
                        </p>
                        <form method="POST" action={{ route('order.store') }}>
                            @csrf
                            <div class="row justify-content-center align-items-center g-2">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ali Bin Abu"
                                        required value="{{ $users->name ?? ''}}">
                                </div>
                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="contact_number" placeholder="0123456789"
                                        required value="{{ $users->contact_number ?? ''}}">
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 mt-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="mohdali23@gmail.com" required value="{{ $users->email ?? ''}}">
                                </div>
                                <!-- Order Method -->
                                <div class="col-md-6 mt-2">
                                    <label for="order-method" class="form-label">Order Method</label>
                                    <select class="form-select form-control" required name="order_method" id="order_method" onchange="toggleAddressForm()">
                                        <option selected disabled>Please Select...</option>
                                        <option value="Walk in">Walk in</option>
                                        <option value="Pickup">Pickup</option>
                                    </select>
                                </div>
                                <div class="col-md-6"></div>
                                <!-- Delivery Option -->
                                <div class="col-md-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delivery_option" id="delivery_option" value="1" onchange="toggleAddressForm()">
                                        <label class="form-check-label" for="delivery-option">
                                            Please tick if you want delivery option
                                        </label>
                                    </div>
                                </div>
                                <!-- Laundry Type -->
                                <div class="col-md-6 mt-2">
                                    <label for="laundry-type" class="form-label">Laundry Type</label>
                                    <select name="laundry_type_id" id="laundry_type_id" class="form-select form-control">
                                        <option selected disabled>Please Select...</option>
                                        @foreach ($laundryTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->laundry_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Service -->
                                <div class="col-md-6 mt-2">
                                    <label for="service" class="form-label">Service</label>
                                    <select name="laundry_service_id" id="laundry_service_id" class="form-select form-control">
                                        <option selected disabled>Please Select...</option>
                                        @foreach ($laundryServices as $service)
                                            <option value="{{ $service->id }}" data-type="{{ $service->laundry_type_id }}">
                                                {{ $service->service_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2" style="display: none;" id="address_form">
                                    <label for="remark" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter any remarks here..."></textarea>
                                </div>
                                <!-- Remark -->
                                <div class="col-md-6 mt-2">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark" rows="3" placeholder="Enter any remarks here..."></textarea>
                                </div>
                                <!-- Quantity -->
                                <div class="col-md-6 mt-2">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" required min="1" value="1">
                                </div>
                                <div class="col-md-6"></div>
                            </div><!-- end row-->
                            <div class="text-center mt-3">
                                <button type="button" onclick="history.back()" class="btn btn-light mr-3">Back</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div><!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
