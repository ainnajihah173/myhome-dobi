@extends('layouts.base')

@section('content')
<div class="container-fluid mt-5">
    <h4 class="header-title">Your Orders</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Laundry Type</th>
                                    <th>Service</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->laundry_type_id }}</td>
                                        <td>{{ $order->laundry_service_id }}</td>
                                        <td>RM {{ number_format($order->total_amount, 2) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            @if($order->status === 'Pending')
                                                <form action="{{ route('billing.customer.pay', $order->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Pay</button>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary btn-sm" disabled>Paid</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
