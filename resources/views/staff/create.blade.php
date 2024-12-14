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
                        <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="contact_number">Phone Number</label>
                                        <input type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" required > <!--autocomplete="new-password"-->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role" required>
                                            <option value="">Select Role</option>
                                            <option value="Dry Cleaner'" {{ old('role') == 'Dry Cleaner' ? 'selected' : '' }}>Dry Cleaner</option>
                                            <option value="Dryer" {{ old('role') == 'Dryer' ? 'selected' : '' }}>Dryer</option>
                                            <option value="Washer/Folder" {{ old('role') == 'Washer/Folder' ? 'selected' : '' }}>Washer/Folder</option>
                                            <option value="Presser/Ironer" {{ old('role') == 'Presser/Ironer' ? 'selected' : '' }}>Presser/Ironer</option>
                                            <option value="Pickup & Delivery Driver" {{ old('role') == 'Pickup & Delivery Driver' ? 'selected' : '' }}>Pickup & Delivery Driver</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" rows="5" required>{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>
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
