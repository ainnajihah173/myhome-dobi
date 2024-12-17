@extends('layouts/base')
@section('content')
    <br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                                    <th>Name</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    @if ($order->order_method === 'Pickup' || $order->order_method === 1)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $order->user->name ?? $order->guest->name }}</td>
                                            <td>{{ $order->laundryService->service_name }}</td>
                                            <td>
                                                @if ($order->order_method === 'Pickup' && $order->status === 'Assign Pickup')
                                                    <span class="badge badge-danger badge-pill">Assign Pickup</span>
                                                @elseif ($order->order_method === 'Pickup' && $order->status === 'Pickup')
                                                    <span class="badge badge-info badge-pill">Pickup</span>
                                                @elseif ($order->order_method === 'Pickup' && $order->status === 'In Work')
                                                    <span class="badge badge-secondary badge-pill">In Work</span>
                                                @elseif ($order->status === 'Assign Delivery')
                                                    <span class="badge badge-warning badge-pill">Assign Delivery</span>
                                                @elseif ($order->status === 'Delivery')
                                                    <span class="badge badge-info badge-pill">Delivery</span>
                                                @elseif ($order->order_method === 1 && $order->status === 'Complete')
                                                    <span class="badge badge-success badge-pill">Complete</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Manager Assign Pickup Driver-->
                                                @if (auth()->user()->staff->role === 'Manager' && $order->status === 'Assign Pickup')
                                                    <!-- Edit Page-->
                                                    <a href="{{ route('delivery.create', $order->id) }}"
                                                        class="action-icon-warning"><i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                @endif

                                                <!-- Manager Assign Deliver Driver-->
                                                @if (auth()->user()->staff->role === 'Manager' && $order->status === 'Assign Delivery')
                                                    <!-- Edit Page-->
                                                    <a href="{{ route('delivery.edit', $order->id) }}"
                                                        class="action-icon-danger"><i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                @endif

                                                <!-- View Page-->
                                                <a href="{{ route('delivery.show', $order->id) }}"
                                                    class="action-icon-success"><i class="mdi mdi-eye"></i></a>

                                                @if (auth()->user()->staff->role === 'Pickup & Delivery Driver' &&
                                                        $order->order_method === 'Pickup' &&
                                                        $order->status === 'Pickup')
                                                    <!-- Proof Pickup -->
                                                    <a href="{{ route('delivery.editPickup', $order->id) }}"
                                                        class="action-icon-info"><i class="mdi mdi-home-map-marker"></i></a>
                                                @endif

                                                @if (auth()->user()->staff->role === 'Pickup & Delivery Driver' &&
                                                        $order->delivery_option === 1 &&
                                                        $order->status === 'Delivery')
                                                    <!-- Proof Pickup -->
                                                    <a href="{{ route('delivery.editDeliver', $order->id) }}"
                                                        class="action-icon-warning"><i class="mdi mdi-home-map-marker"></i></a>
                                                @endif


                                                {{-- @if (auth()->user()->staff->role === 'Manager' && $order->status === 'Delivery')
                                                <!-- Delivery-->
                                                <a href="}" class="action-icon-danger" class="action-icon-info"><i
                                                        class="mdi mdi-truck"></i></a>
                                            @endif --}}
                                            </td>

                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div> <!-- end card-body-->

                </div> <!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
