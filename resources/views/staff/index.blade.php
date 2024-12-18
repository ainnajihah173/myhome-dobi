@extends('layouts/base')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
    
                        <div class="row">
                            <h4 class="header-title">Staff List</h4>
                            <a href="{{route('staff.create')}}" class="btn btn-primary btn-sm" style="position: absolute; right:2%;">+ Add
                                Staff</a>
                        </div>
                        <br>
    
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead style="background: #F9FAFB;">
                                <tr>
                                    <th>No.</th>
                                    <th>Staff ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp 
                                @foreach($staffs as $index => $staff)
                                    @if($staff->role !== 'Manager')
                                        <tr>
                                            <td>{{ $counter }}.</td>
                                            <td>S{{ str_pad($staff->id, 3, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $staff->user->name }}</td>
                                            <td>{{ $staff->role }}</td>
                                            <td>
                                                <!-- View -->
                                                <a href="javascript:void(0);" class="action-icon-info" data-toggle="modal"
                                                   data-target="#view-staff-{{ $staff->id }}"> 
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            
                                                <!-- Edit -->
                                                <a href="javascript:void(0);" class="action-icon-success" data-toggle="modal"
                                                   data-target="#edit-staff-{{ $staff->id }}"> 
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                            
                                                <!-- Delete -->
                                                <a href="javascript:void(0);" class="action-icon-danger" data-toggle="modal"
                                                   data-target="#delete-staff-{{ $staff->id }}"> 
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                            
                                        <!-- View Modal -->
                                        <div id="view-staff-{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Staff Details</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" name="name" value="{{ $staff->user->name }}" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                                    <input type="text" name="contact_number" value="{{ $staff->user->contact_number }}" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" value="{{ $staff->user->email }}" class="form-control"disabled>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="password" value="{{ decrypt($staff->user->password) }}" class="form-control" disabled>
                                                                </div>
                                                            </div> --}}
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <input type="text" value="{{ $staff->gender }}" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <input type="text" value="{{ $staff->role }}" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea name="address" class="form-control" rows="3" disabled>{{ $staff->address }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Update Modal -->
                                        <div id="edit-staff-{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="">Update Staff</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" name="name" value="{{ $staff->user->name }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Phone Number</label>
                                                                        <input type="text" name="contact_number" value="{{ $staff->user->contact_number }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="email" name="email" value="{{ $staff->user->email }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Password</label>
                                                                        <input type="password" id="password-{{ $staff->id }}" class="form-control" placeholder="Leave empty to keep current password">
                                                                        <span class="toggle-password" onclick="togglePasswordVisibility({{ $staff->id }})" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                                                                            <i id="toggle-icon-{{ $staff->id }}" class="fa fa-eye"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Gender</label>
                                                                        <select name="gender" class="form-control">
                                                                            <option {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                                            <option {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Role</label>
                                                                        <select name="role" class="form-control">
                                                                            <option {{ $staff->role == 'Dry Cleaner' ? 'selected' : '' }}>Dry Cleaner</option>
                                                                            <option {{ $staff->role == 'Washer Operator' ? 'selected' : '' }}>Washer Operator</option>
                                                                            <option {{ $staff->role == 'Presser/Ironing' ? 'selected' : '' }}>Presser/Ironing</option>
                                                                            <option {{ $staff->role == 'Pickup & Delivery Driver' ? 'selected' : '' }}>Pickup & Delivery Driver</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <textarea name="address" class="form-control" rows="3">{{ $staff->address }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Delete Modal -->
                                        <div id="delete-staff-{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirm Deletion</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete <strong>{{ $staff->user->name }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $counter++; @endphp
                                    @endif
                                @endforeach
                            </tbody>
                            
                        </table>
                        
                    </div> <!-- end card-body-->     
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    {{-- Display password --}}
    <script>
        function togglePasswordVisibility(staffId) {
            const passwordField = document.getElementById(`password-${staffId}`);
            const toggleIcon = document.getElementById(`toggle-icon-${staffId}`);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }


    </script>
    
@endsection
