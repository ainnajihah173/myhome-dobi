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
                        <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data" autocomplete="off" id="addStaffForm">
                            @csrf
                            <div class="row justify-content-center align-items-center g-2">
                                <!-- Name Field -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                                        <small id="name-error" class="text-danger"></small>
                                    </div>
                                </div>
                        
                                <!-- Phone Number Field -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="contact_number">Phone Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ old('contact_number') }}" required>
                                        <small id="contact-number-error" class="text-danger"></small>
                                    </div>
                                </div>
                        
                                <!-- Email Field -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                                        <small id="email-error" class="text-danger"></small>
                                    </div>
                                </div>
                        
                                <!-- Password Field -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                        <small id="password-error" class="text-danger"></small>
                                    </div>
                                </div>
                        
                                <!-- Gender Field -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <small id="gender-error" class="text-danger"></small>
                                    </div>
                                </div>
                        
                                <!-- Role Field -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="role">Role <span class="text-danger">*</span></label>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="">Select Role</option>
                                            <option value="Dry Cleaner" {{ old('role') == 'Dry Cleaner' ? 'selected' : '' }}>Dry Cleaner</option>
                                            <option value="Dryer" {{ old('role') == 'Dryer' ? 'selected' : '' }}>Dryer</option>
                                            <option value="Washer/Folder" {{ old('role') == 'Washer/Folder' ? 'selected' : '' }}>Washer/Folder</option>
                                            <option value="Presser/Ironer" {{ old('role') == 'Presser/Ironer' ? 'selected' : '' }}>Presser/Ironer</option>
                                            <option value="Pickup & Delivery Driver" {{ old('role') == 'Pickup & Delivery Driver' ? 'selected' : '' }}>Pickup & Delivery Driver</option>
                                        </select>
                                        <small id="role-error" class="text-danger"></small>
                                    </div>
                                </div>
                        
                                <!-- Optional Field: Address -->
                                <div class="col-lg-12 optional-field d-none">
                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="5">{{ old('address') }}</textarea>
                                        <small id="address-error" class="text-danger"></small>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('addStaffForm');
            const requiredFields = ['name', 'contact_number', 'email', 'password', 'gender', 'role'];
            const optionalFields = document.querySelectorAll('.optional-field');
    
            form.addEventListener('input', function () {
                let allFilled = true;
    
                // Check if all required fields are filled
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        allFilled = false;
                    }
                });
    
                // Show or hide optional fields
                optionalFields.forEach(field => {
                    field.classList.toggle('d-none', !allFilled);
                });
            });
        });
    </script>

    <!-- JavaScript for Real-Time Validation -->
    <script>
        document.getElementById('addStaffForm').addEventListener('submit', function (e) {
            let formValid = true;

            // Name validation
            const name = document.getElementById('name');
            if (name.value.trim() === '') {
                formValid = false;
                document.getElementById('name-error').innerText = 'Name is required.';
            } else {
                document.getElementById('name-error').innerText = '';
            }

            // Phone Number validation
            const contactNumber = document.getElementById('contact_number');
            const phoneRegex = /^[0-9]{10,12}$/; // Only 10-12 digits allowed
            if (!phoneRegex.test(contactNumber.value)) {
                formValid = false;
                document.getElementById('contact-number-error').innerText = 'Please enter a valid phone number (10-12 digits).';
            } else {
                document.getElementById('contact-number-error').innerText = '';
            }

            // Email validation
            
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
            if (!emailRegex.test(email.value)) {
                formValid = false;
                document.getElementById('email-error').innerText = 'Please enter a valid email.';
            } else {
                document.getElementById('email-error').innerText = '';
            }

            // Password validation
            const password = document.getElementById('password');
            if (password.value.length < 6) {
                formValid = false;
                document.getElementById('password-error').innerText = 'Password must be at least 6 characters.';
            } else {
                document.getElementById('password-error').innerText = '';
            }

            // Gender validation
            const gender = document.getElementById('gender');
            if (gender.value === '') {
                formValid = false;
                document.getElementById('gender-error').innerText = 'Gender is required.';
            } else {
                document.getElementById('gender-error').innerText = '';
            }

            // Role validation
            const role = document.getElementById('role');
            if (role.value === '') {
                formValid = false;
                document.getElementById('role-error').innerText = 'Role is required.';
            } else {
                document.getElementById('role-error').innerText = '';
            }

            // Address validation
            const address = document.getElementById('address');
            if (address.value.trim() === '') {
                formValid = false;
                document.getElementById('address-error').innerText = 'Address is required.';
            } else {
                document.getElementById('address-error').innerText = '';
            }

            // If form is not valid, prevent submission
            if (!formValid) {
                e.preventDefault();
            }
        });
    </script>
    
@endsection
