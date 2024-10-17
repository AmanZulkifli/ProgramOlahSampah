@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="padding: 150px 0;">
        <h1 class="text-center mb-4">Manage Waste Requests</h1>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h4 class="mb-0">Pending Waste Requests</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Waste Type</th>
                                <th>Quantity (kg)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requests as $request)
                                <tr>
                                    <td>{{ $request->user->name }}</td>
                                    <td>{{ $request->user->email }}</td>
                                    <td>{{ ucfirst($request->waste_type) }}</td>
                                    <td>{{ $request->quantity }}</td>
                                    <td>
                                        <span
                                            class="badge 
                                        @if ($request->status == 'completed') bg-success 
                                        @elseif($request->status == 'pending') bg-warning @endif">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('update.requests', $request->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group">
                                                <select name="status" class="form-select" required>
                                                    <option value="pending"
                                                        {{ $request->status == 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="completed"
                                                        {{ $request->status == 'completed' ? 'selected' : '' }}>Completed
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No pending requests found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
