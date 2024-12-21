@extends('layouts/base')
@section('content')
    <br>
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
                            <i class="mdi mdi-account-multiple widget-icon bg-info" style="color: black; "></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Pending">Assign</h5>
                        <h3 class="mt-3 mb-3">4</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-home-map-marker widget-icon bg-info" style="color: black;"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="In Progress">Pickup</h5>
                        <h3 class="mt-3 mb-3">0</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-truck widget-icon bg-info" style="color: black; "></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Pickup">Delivery </h5>
                        <h3 class="mt-3 mb-3">0</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon bg-info" style="color: black; "></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Delivery">Complete </h5>
                        <h3 class="mt-3 mb-3">1</h3>
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
                                                    <span class="badge badge-success badge-pill">Complete Pickup</span>
                                                @elseif ($order->status === 'Assign Delivery')
                                                    <span class="badge badge-danger badge-pill">Assign Delivery</span>
                                                @elseif ($order->status === 'Delivery')
                                                    <span class="badge badge-info badge-pill">Delivery</span>
                                                @elseif ($order->order_method === 1 && $order->status === 'Complete')
                                                    <span class="badge badge-success badge-pill">Complete Delivery</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Manager Assign Deliver Driver-->
                                                @if (auth()->user()->staff->role === 'Manager' && $order->status === 'Assign Pickup')
                                                    <a href="#" class="action-icon-warning"
                                                        onclick="confirmScheduleView(event, '{{ route('schedule.index') }}', '{{ route('delivery.create', $order->id) }}')">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
                                                @endif

                                                <!-- View Page-->
                                                <a href="{{ route('delivery.show', $order->id) }}"
                                                    class="action-icon-success"><i class="mdi mdi-eye"></i></a>

                                                <!-- Manager Assign Deliver Driver-->
                                                @if (auth()->user()->staff->role === 'Manager' && $order->status === 'Assign Delivery')
                                                    <!-- Edit Page-->
                                                    <a href="{{ route('delivery.edit', $order->id) }}"
                                                        class="action-icon-danger"><i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                @endif

                                                @foreach ($orders as $order)
                                                @if (auth()->user()->staff->role === 'Pickup & Delivery Driver' &&
                                                    $order->order_method === 'Pickup' &&
                                                    $order->status === 'Pickup' &&
                                                    $order->delivery->contains('pickup_id', auth()->user()->id)) <!-- Check if the current user is the pickup driver -->
                                                    <!-- Proof Pickup -->
                                                    <a href="{{ route('delivery.editPickup', $order->id) }}" class="action-icon-info">
                                                        <i class="mdi mdi-home-map-marker"></i>
                                                    </a>
                                                @endif
                                            
                                                @if (auth()->user()->staff->role === 'Pickup & Delivery Driver' &&
                                                    $order->delivery_option === 1 &&
                                                    $order->status === 'Delivery' &&
                                                    $order->delivery->contains('deliver_id', auth()->user()->id)) <!-- Check if the current user is the delivery driver -->
                                                    <!-- Proof Delivery -->
                                                    <a href="{{ route('delivery.editDeliver', $order->id) }}" class="action-icon-warning">
                                                        <i class="mdi mdi-home-map-marker"></i>
                                                    </a>
                                                @endif
                                            @endforeach

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
    <script>
        function confirmScheduleView(event, scheduleUrl, assignUrl) {
            event.preventDefault(); // Prevent the default link behavior

            // Show a confirmation dialog
            const userConfirmed = window.confirm(
                "Please view the driver schedule before assigning a driver. Do you want to view the schedule?");

            if (userConfirmed) {
                // Redirect to the schedule page
                window.location.href = scheduleUrl;
            } else {
                // Redirect to the assign driver page
                window.location.href = assignUrl;
            }
        }
    </script>
@endsection
