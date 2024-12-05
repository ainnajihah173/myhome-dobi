@extends('layouts/base')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

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
                                    <th>Service</th>
                                    <th>Remark</th>
                                    @if (auth()->user()->role === 'Customer')
                                        <th>Total Amount</th>
                                    @endif
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span class="badge badge-danger badge-pill">Pending</span>
                                    </td>
                                    <td>
                                        <!-- View Page-->
                                        <a href="}" class="action-icon-info"><i class="mdi mdi-eye"></i></a>
                                        <!-- Edit Page-->
                                        <a href="" class="action-icon-success"><i
                                                class="mdi mdi-square-edit-outline"></i></a>
                                        <!-- Delete -->
                                        <a href="#" class="action-icon-danger" data-toggle="modal"
                                            data-target="#bs-danger-modal-sm"> <i class="mdi mdi-delete"></i></a>

                                        <!-- Update Status Page-->
                                        <a href="" class="action-icon-warning" data-toggle="modal"
                                            data-target="#bs-update-modal-sm"> <i class="mdi mdi-check-circle"></i></a>

                                </tr>

                        </table>
                    </div> <!-- end card-body-->

                </div> <!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
