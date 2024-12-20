@extends('layouts.base')
@section('content')

@if (auth()->user()->role === 'Customer' || auth()->user()->role === 'Admin')

    {{-- Profile Page --}}
    <div class="row"> <!-- start page title -->
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Profile 2</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile 2</h4>
            </div>
        </div>
    </div> <!-- end page title -->


    <div class="row align-items-stretch">
        <div class="col-xl-4 col-lg-3">
            <div class="card text-center">
                <div class="card-body">
                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">
                    <h4 class="mb-0 mt-2">Dominic Keller</h4>
                    <p class="text-muted font-14">Founder</p>
                    <button type="button" class="btn btn-primary btn-sm mb-2">Follow</button>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Input Types</h4>
                    <p class="text-muted font-14">Edit yout profile here!</p>
                    <form>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Eg:Text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Eg:Text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Eg:Text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Eg:Text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Eg:Text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control" placeholder="Eg:Text">
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row-->


    {{-- Table Page --}}
    <div class="row"> <!-- start page title -->
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Data Table </li>
                    </ol>
                </div>
                <h4 class="page-title">Data Table</h4>
            </div>
        </div>
    </div> <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <h4 class="header-title">Basic Data Table</h4>
                        <a href="" class="btn btn-primary btn-sm" style="position: absolute; right:2%;">+ Add
                            User</a>
                    </div>
                    <br>

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead style="background: #F9FAFB;">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>
                                    <span class="badge badge-success badge-pill">Closed</span>
                                </td>
                                {{-- <td>
                                    <!-- View Page-->
                                    <a href="" class="btn btn-outline-success btn-sm "><i class="dripicons-document-edit"></i></a>
                                   <!-- View Page-->
                                    <a href="" class="btn btn-outline-info btn-sm"><i class="uil-eye"></i></a>
                                </td> --}}
                                <td>
                                    <!-- View Page-->
                                    <a href="javascript:void(0);" class="action-icon-info" data-toggle="modal"
                                        data-target="#bs-view-modal-lg"> <i class="mdi mdi-eye"></i></a>
                                    <!-- Edit Page-->
                                    <a href="javascript:void(0);" class="action-icon-success" data-toggle="modal"
                                        data-target="#bs-edit-modal-lg"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <!-- Delete Page-->
                                    <a href="javascript:void(0);" class="action-icon-danger" data-toggle="modal"
                                        data-target="#bs-danger-modal-sm"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                    </table>
                </div> <!-- end card-body-->

                <!-- View modal -->
                <div class="modal fade" id="bs-view-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">View modal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="simpleinput">Text</label>
                                                <input type="text" id="simpleinput" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-email">Email</label>
                                                <input type="email" id="example-email" name="example-email"
                                                    class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-password">Password</label>
                                                <input type="password" id="example-password" class="form-control"
                                                    value="password">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="password">Show/Hide Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control"
                                                        placeholder="Enter your password">
                                                    <div class="input-group-append" data-password="false">
                                                        <div class="input-group-text">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-palaceholder">Placeholder</label>
                                                <input type="text" id="example-palaceholder" class="form-control"
                                                    placeholder="placeholder">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-readonly">Readonly</label>
                                                <input type="text" id="example-readonly" class="form-control"
                                                    readonly="" value="Readonly value">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="example-textarea">Text area</label>
                                                <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end row-->
                                </form>
                            </div><!-- /.modal-body -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- Edit Modal -->
                <div class="modal fade" id="bs-edit-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Edit modal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="simpleinput">Text</label>
                                                <input type="text" id="simpleinput" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-email">Email</label>
                                                <input type="email" id="example-email" name="example-email"
                                                    class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-password">Password</label>
                                                <input type="password" id="example-password" class="form-control"
                                                    value="password">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="password">Show/Hide Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control"
                                                        placeholder="Enter your password">
                                                    <div class="input-group-append" data-password="false">
                                                        <div class="input-group-text">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-palaceholder">Placeholder</label>
                                                <input type="text" id="example-palaceholder" class="form-control"
                                                    placeholder="placeholder">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="example-readonly">Readonly</label>
                                                <input type="text" id="example-readonly" class="form-control"
                                                    readonly="" value="Readonly value">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="example-textarea">Text area</label>
                                                <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end row-->
                                </form>
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- Delete modal -->
                <div class="modal fade" id="bs-danger-modal-sm" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="font-14" id="mySmallModalLabel">Delete Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete this data?</p>
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">No,
                                    cancel</button>
                                <button type="button" class="btn btn-danger btn-sm">Yes, delete</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    {{-- Form Page --}}
    <div class="row"> <!-- start page title -->
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Form Page </li>
                    </ol>
                </div>
                <h4 class="page-title">Form Page</h4>
            </div>
        </div>
    </div> <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Form Users</h4>
                    <p class="text-muted font-14">
                        Please fill in the form.
                    </p>
                    <form>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Text</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-email">Email</label>
                                    <input type="email" id="example-email" name="example-email" class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-password">Password</label>
                                    <input type="password" id="example-password" class="form-control" value="password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="password">Show/Hide Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-palaceholder">Placeholder</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="placeholder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-textarea">Text area</label>
                                    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-readonly">Readonly</label>
                                    <input type="text" id="example-readonly" class="form-control" readonly=""
                                        value="Readonly value">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-disable">Disabled</label>
                                    <input type="text" class="form-control" id="example-disable" disabled=""
                                        value="Disabled value">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-static">Static control</label>
                                    <input type="text" readonly class="form-control-plaintext" id="example-static"
                                        value="email@example.com">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-0">
                                    <label for="example-helping">Helping text</label>
                                    <input type="text" id="example-helping" class="form-control"
                                        placeholder="Helping text">
                                    <span class="help-block"><small>A block of help text that breaks onto a new line and
                                            may extend beyond one line.</small></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-select">Input Select</label>
                                    <select class="form-control" id="example-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-multiselect">Multiple Select</label>
                                    <select id="example-multiselect" multiple class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-fileinput">Default file input</label>
                                    <input type="file" id="example-fileinput" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-date">Date</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-month">Month</label>
                                    <input class="form-control" id="example-month" type="month" name="month">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-time">Time</label>
                                    <input class="form-control" id="example-time" type="time" name="time">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-week">Week</label>
                                    <input class="form-control" id="example-week" type="week" name="week">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-number">Number</label>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="example-color">Color</label>
                                    <input class="form-control" id="example-color" type="color" name="color"
                                        value="#727cf5">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-0">
                                    <label for="example-range">Range</label>
                                    <input class="custom-range" id="example-range" type="range" name="range"
                                        min="0" max="100">
                                </div>
                            </div>
                        </div><!-- end row-->
                        <div class="text-center mt-2">
                            <button type="button" onclick="history.back()" class="btn btn-light mr-3">Back</button>
                            <button type="submit" class="btn btn-danger">Save</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div><!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    {{-- View Page --}}
    <div class="row"> <!-- start page title -->
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">View Page </li>
                    </ol>
                </div>
                <h4 class="page-title">View Page</h4>
            </div>
        </div>
    </div> <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-md-11 col-12">
                            <h4 class="header-title">Bill #8</h4>
                            <p class="text-muted font-12">
                                25 Oct - 24 Nov
                            </p>
                        </div>
                        <div class="col-md-1 col-12">
                            <span class="noti-icon-badge bg-danger"></span>
                            <h5 class="ml-1">Unpaid</h5>
                        </div>
                    </div>
                    <h6>Kiosk Name</h6>
                    <p class="text-muted font-12 font-weight-bold">Pak Mat Western</p>
                </div> <!-- end card-body-->
            </div><!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Summary</h4>
                    <div class="row justify-content-center align-items-center g-2 mt-4">
                        <div class="col-lg-6">
                            <label for="example-week">Name</label>
                            <p>Bryan Tan</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="example-week">Kiosk Number</label>
                            <p>FKK01</p>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="example-week">Name</label>
                            <p>Bryan Tan</p>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="example-week">Kiosk Number</label>
                            <p>FKK01</p>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="example-week">Name</label>
                            <p>Bryan Tan</p>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div><!-- end card-->
        </div> <!-- end col -->

    </div> <!-- end row -->
@endif

@if (auth()->user()->role === 'Staff')

    <div class="row mt-3">
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-account-multiple widget-icon" style="color: black; "></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Order Today">Order Today</h5>
                    <h3 class="mt-3 mb-3">{{ $orderToday }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-account-multiple widget-icon" style="color: black;"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="Overdue Jobs">Overdue Jobs</h5>
                    <h3 class="mt-3 mb-3">{{ $overdueJobs }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-pulse widget-icon" style="color: black; "></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="This Month Sales ">This Month Sales </h5>
                    <h3 class="mt-3 mb-3">RM {{ number_format($thisMonthSales, 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-right">
                        <i class="mdi mdi-pulse widget-icon" style="color: black; "></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0" title="This Year Sales">This Year Sales </h5>
                    <h3 class="mt-3 mb-3">RM {{ number_format($thisYearSales, 2) }}</h3>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-2">
                        <h4 class="mx-2 header-title">Customer List</h4>
                    </div>
                    <br>
    
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead style="background: #F9FAFB;">
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user ? $order->user->name : ($order->guest ? $order->guest->name : 'N/A') }}</td>
                                <td>{{ $order->user ? $order->user->contact_number : ($order->guest ? $order->guest->contact_number : 'N/A') }}</td>
                                <td>{{ $order->laundryService ? $order->laundryService->service_name : 'N/A' }}</td>
                                <td>
                                    <!-- View -->
                                    <a href="#" data-toggle="modal" data-target="#view-order-{{ $order->id }}" class="action-icon-success">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
    
                                    <!-- Delete -->
                                    <a href="#" data-toggle="modal" data-target="#delete-order-{{ $order->id }}" class="action-icon-danger">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- View Modal -->
                            <div id="view-order-{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Order Details</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Customer Name</label>
                                                            <input type="text" class="form-control" value="{{ $order->user ? $order->user->name : ($order->guest ? $order->guest->name : 'N/A') }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input type="text" class="form-control" value="{{ $order->user ? $order->user->contact_number : ($order->guest ? $order->guest->contact_number : 'N/A') }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Service</label>
                                                            <input type="text" class="form-control" value="{{ $order->laundryService ? $order->laundryService->service_name : 'N/A' }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text" class="form-control" value="{{ $order->quantity ?? 'N/A' }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Remark</label>
                                                            <input type="text" class="form-control" value="{{ $order->remark ?? 'N/A' }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Total Amount</label>
                                                            <input type="text" class="form-control" value="${{ number_format($order->total_amount, 2) }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Order Method</label>
                                                            <input type="text" class="form-control" value="{{ $order->order_method }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Delivery Option</label>
                                                            <input type="text" class="form-control" value="{{ $order->delivery_option }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Pickup Date</label>
                                                            <input type="text" class="form-control" value="{{ $order->pickup_date ? \Carbon\Carbon::parse($order->pickup_date)->format('d M Y ') : 'N/A' }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control" rows="2" readonly>{{ $order->address ?? 'N/A' }}</textarea>
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

                            <!-- Delete Modal -->
                            <div id="delete-order-{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Confirm Deletion</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <strong>{{ $order->user ? $order->user->name : ($order->guest ? $order->guest->name : 'this order') }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('customers.destroy', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No customers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    @if($showTutorial)
        <!-- Tutorial Overlay -->
        <div id="tutorial-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 9999; display: flex; justify-content: center; align-items: center;">
            <!-- Arrow Pointer -->
            <div style="position: absolute; top: 240px; left: 180px; transform: rotate(-45deg); z-index: 10000;">
                <i class="uil uil-arrow-left" style="font-size: 60px; color: #39afd1;"></i>
            </div>

            <!-- Tooltip -->
            <div style="position: absolute; top: 250px; left: 240px; background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 300px; z-index: 10000;">
                <h5 class="text-dark font-weight-bold">Welcome!</h5>
                <p class="text-dark" style="font-size: 14px;">This is your <strong>Schedule</strong>. Click on the sidebar link to view your schedule.</p>
                <button id="dismiss-tutorial" class="btn btn-primary btn-sm">Got it, Don’t Show Again</button>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            document.getElementById('dismiss-tutorial').addEventListener('click', function () {
                fetch('{{ route("dismiss.schedule.tutorial") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        document.getElementById('tutorial-overlay').style.display = 'none';
                    } else {
                        console.error('Error dismissing tutorial');
                    }
                }).catch(error => console.error('Fetch error:', error));
            });
        </script>
    @endif



@endif


@endsection
