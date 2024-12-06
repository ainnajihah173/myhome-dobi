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
                        <form method="POST" action={{ route('order.store') }} enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center align-items-center g-2">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ali Bin Abu"
                                        required>
                                </div>
                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="+60123456789"
                                        required>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 mt-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="mohdali23@gmail.com" required>
                                </div>
                                <!-- Order Method -->
                                <div class="col-md-6 mt-2">
                                    <label for="order-method" class="form-label">Order Method</label>
                                    <select class="form-select form-control" id="order-method" required>
                                        <option selected>Please Select...</option>
                                        <option>Walk in</option>
                                        <option>Delivery</option>
                                    </select>
                                </div>
                                <div class="col-md-6"></div>
                                <!-- Delivery Option -->
                                <div class="col-md-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="delivery-option">
                                        <label class="form-check-label" for="delivery-option">
                                            Please tick if you want delivery option
                                        </label>
                                    </div>
                                </div>
                                <!-- Laundry Type -->
                                <div class="col-md-6 mt-2">
                                    <label for="laundry-type" class="form-label">Laundry Type</label>
                                    <select class="form-select form-control" id="laundry-type" required>
                                        <option selected>Please Select...</option>
                                        <option>Washing</option>
                                        <option>Dry Cleaning</option>
                                        <option>Ironing</option>
                                    </select>
                                </div>
                                <!-- Service -->
                                <div class="col-md-6 mt-2">
                                    <label for="service" class="form-label">Service</label>
                                    <select class="form-select form-control" id="service" required>
                                        <option selected>Please Select...</option>
                                        <option>Standard</option>
                                        <option>Express</option>
                                    </select>
                                </div>
                                <!-- Remark -->
                                <div class="col-md-6 mt-2">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" id="remark" rows="3" placeholder="Enter any remarks here..."></textarea>
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
