@extends('layouts.base')
@section('content')

<div class="container-fluid mt-5">
    {{-- Sales Summary --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h6>This Month</h6>
                    <h3>RM 820.55</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h6>This Year</h6>
                    <h3>RM 11,252.20</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h6>Total</h6>
                    <h3>RM 115,066.40</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Sales Chart --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Total Sales</h4>
                    <div style="height: 300px; overflow: hidden;">
                        <canvas id="sales-chart-canvas" style="height: 100%; width: 100%;"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx = document.getElementById('sales-chart-canvas').getContext('2d');
                        var salesChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'Sales',
                                    data: [257.45, 379.21, 431.78, 500, 600, 750, 800, 650, 400, 900, 1000, 950],
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    {{-- Sales List --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Sales List</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Sales Month</th>
                                    <th>Year</th>
                                    <th>Total Sales</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>January</td>
                                    <td>2023</td>
                                    <td>RM 257.45</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>February</td>
                                    <td>2023</td>
                                    <td>RM 379.21</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>March</td>
                                    <td>2023</td>
                                    <td>RM 431.78</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
