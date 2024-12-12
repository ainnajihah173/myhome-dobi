@extends('layouts/base')

@section('content')
    <div class="mt-4 text-dark ml-2">
        <a href="{{ route('order.index') }}" class="mdi mdi-chevron-left text-dark"> Back to Order List</a>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Order #{{ $order->id }}</h4>
                        <p class="text-muted font-13 mb-3">
                            {{ $order->created_at->format('d F Y, H:i') }}
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $order->guest->name ?? $order->user->name }}</p>
                                <p><strong>No. Phone:</strong>
                                    {{ $order->guest->contact_number ?? $order->user->contact_number }}</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <span
                                    class="badge badge-pill 
                                        @if ($order->status === 'Pending') badge-light
                                        @elseif ($order->status === 'In Work') badge-warning
                                        @elseif ($order->status === 'Pay') badge-danger
                                        @elseif ($order->status === 'Complete') badge-success @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Summary</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ $order->guest->email ?? $order->user->email }}</p>
                                <p><strong>Laundry Type:</strong> {{ $order->laundryType->laundry_name }}</p>
                                <p><strong>Total Amount:</strong> RM {{ number_format($order->total_amount, 2) }}</p>
                                <p><strong>Quantity:</strong> {{ $order->quantity ?? 'N/A' }}</p>
                                <p><strong>Remark:</strong> {{ $order->remark ?? 'No remarks' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Order Method:</strong> {{ $order->order_method }}</p>
                                <p><strong>Delivery Address:</strong> {{ $order->address ?? 'N/A' }}</p>
                                <p><strong>Laundry Service:</strong> {{ $order->laundryService->service_name }}</p>
                                <p><strong>Others:</strong></p>
                                <ul>
                                    <li><a href="/path/to/proof-of-delivery.pdf" target="_blank">Proof of Delivery.pdf</a>
                                    </li>
                                    <li><a href="/path/to/invoice-payment.pdf" target="_blank">Invoice Payment.pdf</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="button" onclick="history.back()" class="btn btn-light">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
