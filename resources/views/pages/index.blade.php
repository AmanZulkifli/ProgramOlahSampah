@extends('layouts.app')

@section('content')
    <style>
        body {
            margin-top: 20px;
            background: #FAFAFA;
        }

        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #4099ff, #73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2ed8b6, #59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
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
    <div class="container mt-4" style="padding: 100px 0;">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p class="text-muted">Here is an overview of your recycling activities:</p>

        {{-- stats --}}
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
                        <h5 class="card-title m-b-20 ">Level</h5>
                        <p class="card-text display-4 m-b-0">{{ Auth::user()->level }}</p>
                    </div>
                </div>
            </div>
        </div>


        {{-- Activity table --}}
        <div class="mt-5">
            <h4>Recent Waste Submission</h4>
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
