@extends('layouts/base')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple widget-icon" style="color: black; "></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Pending">Pending</h5>
                        <h3 class="mt-3 mb-3">10 </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple widget-icon" style="color: black;"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="In Progress">In Progress</h5>
                        <h3 class="mt-3 mb-3">10 </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon" style="color: black; "></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Pickup">Pickup </h5>
                        <h3 class="mt-3 mb-3">10</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon" style="color: black; "></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Delivery">Delivery </h5>
                        <h3 class="mt-3 mb-3">10</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row mt-2">
                            <h4 class="mx-2 header-title">Delivery List</h4>
                            {{-- <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm"
                                style="position: absolute; right:2%;">+ New
                                Order</a> --}}
                        </div>
                        <br>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead style="background: #F9FAFB;">
                                <tr>
                                    <th>No.</th>
                                    @if (auth()->user()->role === 'Staff')
                                        <th>Name</th>
                                        <th>Service</th>
                                        <th>Remark</th>
                                    @endif

                                    @if (auth()->user()->role === 'Customer')
                                        <th>Total Amount</th>
                                        <th>Laundry Type</th>
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
                                        <!-- Edit Page-->
                                        <a href="{{route('delivery.create')}}" class="action-icon-warning"><i
                                            class="mdi mdi-square-edit-outline"></i></a>
                                        <!-- View Page-->
                                        <a href="}" class="action-icon-success"><i class="mdi mdi-eye"></i></a>

                                          <!-- Proof -->
                                          <a href="javascript: void(0);" class="action-icon-info" data-toggle="modal"
                                          data-target="#view-modal" > <i class="mdi mdi-home-map-marker"></i></a>

                                        <!-- Delivery-->
                                        <a href="}"  class="action-icon-danger" class="action-icon-info"><i class="mdi mdi-truck"></i></a>


                                </tr>
                                 <!-- View modal -->
                                    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="viewModalLabel">Proof of Pickup</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4" class="col-form-label">Name</label>
                                                                <input type="text" class="form-control" id="inputEmail4"
                                                                    placeholder="Ali Bin Abu" readonly="">
                                                            </div>
                                                            <div class="form-group col-md-6 ">
                                                                <label for="inputEmail4" class="col-form-label">Phone Number</label>
                                                                <input type="text" class="form-control" id="inputEmail4"
                                                                    placeholder="XXXXXXX" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-textarea">Pickup Address</label>
                                                            <textarea class="form-control" id="example-textarea" rows="5" placeholder="Mukim 123, Sungai Tawar"
                                                                readonly=""></textarea>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputState" class="col-form-label">Pickup Date</label>
                                                                <input type="date" class="form-control" id="inputEmail4"
                                                                     readonly="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputState" class="col-form-label">Pickup Time</label>
                                                                <input type="time" class="form-control"
                                                                    id="inputEmail4"  readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-textarea">Upload Proof</label>
                                                            <input type="file" name="pdf" class="form-control" id="pdf" accept=".pdf">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                            </tbody>
                        </table>
                    </div> <!-- end card-body-->

                </div> <!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
