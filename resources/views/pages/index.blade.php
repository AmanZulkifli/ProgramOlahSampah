@extends('layouts.app')

@section('content')
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #F0F2F5;
            color: #333;
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .order-card {
            color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            height: 220px; /* Set a fixed height for uniformity */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-card:hover {
            transform: translateY(-5px);
        }

        .bg-c-blue {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
        }

        .bg-c-green {
            background: linear-gradient(to right, #43cea2, #185a9d);
        }

        .bg-c-yellow {
            background: linear-gradient(to right, #f7971e, #ffd200);
        }

        .bg-c-pink {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
        }

        .card {
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            font-family: 'Poppins', sans-serif;
        }

        .card .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h2.judul {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .text-muted {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Adjust font sizes for better readability */
        .card-text {
            font-size: 2rem;
            font-weight: 600;
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
        }

        .thead-dark th {
            background-color: #333;
            color: #fff;
        }

        /* Table row hover effect */
        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }
    </style>


@if (Session::get('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
<div class="container" style="padding: 100px 50px;">
        <h2 class="judul">Welcome, {{ Auth::user()->name }}</h2>
        <p class="text-muted">Here is an overview of your recycling activities:</p>

        {{-- stats --}}
        <div class="container stats">
            <div class="row text-center">
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">Total Waste Submitted</h5>
                            <p class="card-text display-4 m-b-0">{{ count($waste_records) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">Total Weight Submitted</h5>
                            <p class="card-text display-4 m-b-0">{{ $total_waste }}Kg</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">Total Points</h5>
                            <p class="card-text display-4 m-b-0">{{ Auth::user()->points }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">Level</h5>
                            <p class="card-text display-4 m-b-0">{{ Auth::user()->level }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Activity table --}}
        <div class="mt-5">
            <h4 class="judul">Recent Waste Submission</h4>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>Waste Type</th>
                        <th>Quantity (kg)</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waste_records as $record)
                        <tr>
                            <td>{{ ucfirst($record->waste_type) }}</td>
                            <td>{{ $record->quantity }}</td>
                            <td>{{ ucfirst($record->status) }}</td>
                            <td>{{ $record->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $waste_records->links() }}
        </div>
    </div>
@endsection
