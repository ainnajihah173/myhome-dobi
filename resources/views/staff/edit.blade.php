@extends('layouts/base')
@section('content')
    <div class="mt-4 text-dark ml-2">
        <a href="{{ route('staff.index') }}" class="mdi mdi-chevron-left text-dark"> Back to Staff List</a>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Add New Staff</h4>
                        <p class="text-muted font-13 mb-4">
                            Write your new staff information here.
                        </p>
                        <form method="POST" action={{ route('staff.store') }} enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" id="phone" name="phoneNum" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="example-select">Role</label>
                                        <select class="form-control" id="role">
                                            <option>Please select</option>
                                            <option>Dry Cleaning</option>
                                            <option>Manager</option>
                                            <option>Ironning</option>
                                            <option>Pickup & Delivery Driver</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
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
