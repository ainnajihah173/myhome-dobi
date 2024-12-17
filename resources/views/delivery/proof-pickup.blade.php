@extends('layouts/base')
@section('content')
    <div class="mt-4 text-dark ml-2">
        <a href="{{ route('delivery.index') }}" class="mdi mdi-chevron-left text-dark"> Back to Delivery & Pickup List</a>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4 class="">Upload Proof of Pickup</h4>
                        <p class="text-muted font-13 mb-4">
                            Please Fill the Form Below
                        </p>
                        <form action="{{ route('delivery-proof.pickup', $delivery->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="inputNama">Name</label>
                                        <input type="text" name="user-name" class="form-control"
                                            value="{{ $delivery->order->user->name ?? $delivery->order->guest->name }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Phone Number</label>
                                        <input type="text" name="contact-number" class="form-control"
                                            value="{{ $delivery->order->user->contact_number ?? $delivery->order->guest->contact_number }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $delivery->order->user->email ?? $delivery->order->guest->email }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Order Method</label>
                                        <input type="text" name="order_method" class="form-control"
                                            value="{{ $delivery->order->order_method }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Pickup Date</label>
                                        <input type="text" id="pickup_date" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($delivery->order->pickup_date)->format('d F Y') }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Pickup Time</label>
                                        <input type="text" id="pickup_time" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($delivery->order->pickup_date)->format('h:i A') }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="example-textarea">Pickup Address</label>
                                        <textarea class="form-control" name="address" id="example-textarea" rows="5" readonly>{{ $delivery->order->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="example-textarea">Remark</label>
                                        <textarea class="form-control" name="remark" id="example-textarea" rows="5" readonly>{{ $delivery->order->remark }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="inputPickupDriver" class="col-form-label">Driver Assign</label>
                                        <input type="text" name="pickup_id" class="form-control"
                                            value="{{ $delivery->pickupDriver->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="example-textarea">Upload Proof Pickup</label>
                                    <input type="file" name="proof_pickup" class="form-control"
                                        id="proof-file-{{ $order->id }}" accept="image/">
                                </div>

                                @if ($delivery->order->delivery_option === 1 && $delivery->order->status === 'Delivery')
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="kiosk-number">Delivery Date</label>
                                            <input type="text" id="delivery_date" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($delivery->delivery_date)->format('d F Y') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="kiosk-number">Delivery Time</label>
                                            <input type="text" id="delivery_time" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($delivery->delivery_date)->format('h:i A') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="inputdeliverDriver" class="col-form-label">Driver Assign</label>
                                            <input type="text" name="deliver_driver" class="form-control"
                                                value="{{ $delivery->deliver_driver }}" readonly>
                                        </div>
                                    </div>
                                @endif

                            </div><!-- end row-->
                            <div class="text-center mt-2">
                                <button type="button" onclick="history.back()" class="btn btn-light mr-3">Back</button>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div><!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
