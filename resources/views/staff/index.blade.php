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
                                            <!-- Modal content here -->
                                        </div>
                            
                                        <!-- Update Modal -->
                                        <div id="edit-staff-{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <!-- Modal content here -->
                                        </div>
                            
                                        <!-- Delete Modal -->
                                        <div id="delete-staff-{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <!-- Modal content here -->
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
