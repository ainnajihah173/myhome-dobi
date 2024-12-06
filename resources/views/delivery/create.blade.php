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
                        <h4 class="">Pickup Driver</h4>
                        <p class="text-muted font-13 mb-4">
                           Please Fill the Form Below
                        </p>
                        <form method="POST" action={{ route('delivery.store') }} enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-tenant">Name</label>
                                        <input type="text" class="form-control" value="XXXXXX" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Phone Number</label>
                                        <input type="text" id="kiosk-number"
                                            value="XXXXXX"
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Email</label>
                                        <input type="email" id="kiosk-number"
                                            value="XXXXXX"
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Order Method</label>
                                        <input type="text" id="kiosk-number"
                                            value="XXXXXX"
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Pickup Date</label>
                                        <input type="date" id="kiosk-number"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="kiosk-number">Pickup Time</label>
                                        <input type="time" id="kiosk-number"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="example-textarea">Pickup Address</label>
                                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="example-textarea">Remark</label>
                                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="example-select">Assign Driver</label>
                                        <select class="form-control" id="example-select">
                                            <option>XXXXXX</option>
                                        </select>
                                    </div>
                                </div>
                            
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
