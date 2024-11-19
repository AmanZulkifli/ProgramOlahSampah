@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 150px 0;">
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
                    <!-- Bulk form for multiple requests -->
                    <form action="{{ route('bulk.update.requests') }}" method="POST" id="bulkForm">
                        @csrf
                        @method('PUT')
                    </form>

                    <table class="table table-hover table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th><input type="checkbox" id="select-all" /></th> <!-- Checkbox for selecting all -->
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Waste Type</th>
                                <th>Quantity (kg)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requests as $wasteRequest)
                                <tr>
                                    <!-- Checkbox for each row -->
                                    <td>
                                        <input type="checkbox" name="requests[]" value="{{ $wasteRequest->id }}" form="bulkForm" />
                                    </td>
                                    <td>{{ $wasteRequest->user->name }}</td>
                                    <td>{{ $wasteRequest->user->email }}</td>
                                    <td>{{ ucfirst($wasteRequest->waste_type) }}</td>
                                    <td>{{ $wasteRequest->quantity }}</td>
                                    <td>
                                        <span class="badge 
                                            @if ($wasteRequest->status == 'completed') bg-success 
                                            @elseif($wasteRequest->status == 'pending') bg-warning 
                                            @endif">
                                            {{ ucfirst($wasteRequest->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($wasteRequest->status == 'pending')
                                            <!-- Single request form, outside the form tag but associated using form attribute -->
                                            <button type="submit" name="status" value="completed"
                                                    form="singleForm{{ $wasteRequest->id }}" class="btn btn-success btn-sm">
                                                Mark as Completed
                                            </button>
                                            
                                            <!-- Single request form declaration -->
                                            <form id="singleForm{{ $wasteRequest->id }}" action="{{ route('update.requests', $wasteRequest->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        @else
                                            <span class="text-muted">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No pending requests found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Bulk action button -->
                    <button type="submit" class="btn btn-primary mt-3" form="bulkForm">Mark Selected as Completed</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to handle "select all" functionality -->
    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('input[name="requests[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
        });
    </script>
@endsection
