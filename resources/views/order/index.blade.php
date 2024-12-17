@extends('layouts/base')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($message = session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="text-black mb-0">{{ session()->get('success') }}</p>
                            </div>

                            <!-- Add the following JavaScript to auto-dismiss the alert after 3 seconds -->
                            <script>
                                setTimeout(function() {
                                    $('.alert').alert('close');
                                }, 3000); // 3000 milliseconds = 3 seconds
                            </script>
                        @endif
                        <div class="row mt-2">
                            <h4 class="mx-2 header-title">Order List</h4>
                            <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm"
                                style="position: absolute; right:2%;">+ New
                                Order</a>
                        </div>
                        <br>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead style="background: #F9FAFB;">
                                <tr>
                                    <th>No.</th>
                                    @if (auth()->user()->role === 'Staff')
                                        <th>Name</th>
                                    @endif
                                    <th>Laundry Type</th>
                                    <th>Laundry Service</th>
                                    <th>Remark</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $orders)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if (auth()->user()->role === 'Staff')
                                            <td>{{ $orders->user->name ?? $orders->guest->name }}</td>
                                        @endif
                                        <td>{{ $orders->laundryType->laundry_name }}</td>
                                        <td>{{ $orders->laundryService->service_name }}</td>
                                        <td>{{ $orders->remark ?? 'No remarks' }}</td>
                                        <td>RM {{ $orders->total_amount ?? '0.00' }}</td>
                                        <td>
                                            @if ($orders->status === 'Pending')
                                                <span class="badge badge-light badge-pill">Pending</span>
                                            @elseif($orders->status === 'In Work')
                                                <span class="badge badge-warning badge-pill">In Work</span>
                                            @elseif($orders->status === 'Pay')
                                                <span class="badge badge-danger badge-pill">Pay</span>
                                            @elseif($orders->status === 'Complete')
                                                <span class="badge badge-success badge-pill">Complete</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- View Page-->
                                            <a href="{{ route('order.show', $orders->id )}}" class="action-icon-info"><i class="mdi mdi-eye"></i></a>

                                            @if ($orders->status === 'Pending')
                                                <!-- Edit Page-->
                                                <a href="{{ route('order.edit', $orders->id )}}" class="action-icon-success"><i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                @if(auth()->user()->role === 'Customer')
                                                <!-- Delete -->
                                                <a href="#" class="action-icon-danger" data-toggle="modal"
                                                    data-target="#bs-danger-modal-sm"> <i class="mdi mdi-delete"></i></a>
                                                @endif
                                            @elseif($orders->status === 'Pay' || auth()->user()->role === 'Staff' && $orders->status === 'Complete')
                                                <!-- Pay -->
                                                <a href="{{ route('billing.customer.payment.page', $orders->id) }}" class="side-nav-link action-icon-secondary" class="side-nav-link" class="action-icon-secondary"><i
                                                    class="mdi mdi-credit-card"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
