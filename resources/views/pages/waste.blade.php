@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 100px 50px;">
        <h1 class="mb-4">Waste Submission & Tracking</h1>

        {{-- Form untuk submit jenis sampah yang ingin disetor --}}
        <div class="row mb-5">
            <div class="col-md-10 mx-auto">
                <div class="card border-0">
                    {{-- Header card form --}}
                    <div class="card-header text-dark">
                        <h4>Submit New Waste</h4>
                    </div>
                    {{-- Body card untuk form --}}
                    <div class="card-body">
                        <form action="{{ route('waste.store') }}" method="POST">
                            @csrf
                            {{-- Dropdown untuk memilih jenis sampah --}}
                            <h4>No 1</h4>
                            <div class="form-group mb-3">
                                <label for="waste_type">Waste Type</label>
                                <select name="waste_type[]" id="waste_type" class="form-control" required>
                                    <option value="" selected disabled>Select Waste Type</option>
                                    <option value="plastic">Plastic</option>
                                    <option value="paper">Paper</option>
                                    <option value="metal">Metal</option>
                                    <option value="glass">Glass</option>
                                    <option value="organic">Organic</option>
                                </select>
                            </div>

                            {{-- Input untuk memasukkan kuantitas sampah dalam satuan kg --}}
                            <div class="form-group mb-3">
                                <label for="quantity">Quantity (kg)</label>
                                <input type="number" name="quantity[]" id="quantity" class="form-control" step="0.1"
                                    min="0.1" required>
                            </div>

                            {{-- Tombol untuk submit form --}}

                            <div id="waste-more"></div>
                            <span class="text-primary" style="font-weight: bold; cursor: pointer" id="btn-more">add more
                                waste</span>
                            <button type="submit" class="btn btn-primary btn-block">Add Waste</button>

                        </form>
                    </div>
                </div>

                {{-- Pesan sukses jika submission berhasil --}}
                @if (session('success'))
                    <div class="alert alert-success mt-4">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- Tabel untuk menampilkan daftar sampah yang sudah disetor --}}
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card shadow-sm border-0">
                    {{-- Header tabel --}}
                    <div class="card-header text-dark text-center">
                        <h4>Your Waste Submissions</h4>
                    </div>
                    {{-- Body tabel --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                {{-- Header kolom tabel --}}
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Waste Type</th>
                                        <th>Quantity (kg)</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- Body untuk daftar sampah yang disetor --}}
                                <tbody>
                                    @if ($waste->isEmpty())
                                        {{-- Pesan jika belum ada data sampah yang disetor --}}
                                        <tr>
                                            <td colspan="6" class="text-center">No waste submissions found.</td>
                                        </tr>
                                    @else
                                        {{-- Loop untuk menampilkan data setiap submission --}}
                                        @foreach ($waste as $item)
                                            <tr>
                                                {{-- Nomor urut data --}}
                                                <td>{{ ($waste->currentPage() - 1) * $waste->perPage() + $loop->index + 1 }}
                                                </td>
                                                {{-- Jenis sampah --}}
                                                <td>{{ ucfirst($item->waste_type) }}</td>
                                                {{-- Kuantitas dalam kg --}}
                                                <td>{{ $item->quantity }}</td>
                                                {{-- Status submission (completed, pending, atau failed) --}}
                                                <td>
                                                    <span
                                                        class="badge 
                                                    @if ($item->status == 'completed') bg-success 
                                                    @elseif($item->status == 'pending') bg-warning 
                                                    @else bg-danger @endif">
                                                        {{ ucfirst($item->status) }}
                                                    </span>
                                                </td>
                                                {{-- Tanggal submission --}}
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                {{-- Tindakan yang bisa dilakukan (misal: cancel submission jika status pending) --}}
                                                <td>
                                                    @if ($item->status === 'pending')
                                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modalDeleteAkun"
                                                            onclick="showModal('{{ $item->id }}', '{{ $item->waste_type }}')">
                                                            Cancel
                                                        </button>
                                                    @else
                                                        <span class="text-muted">No Action</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- Pagination untuk mempermudah navigasi data --}}
                        <div class="d-flex justify-content-center">
                            {{ $waste->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal untuk konfirmasi cancel submission --}}
        <div class="modal fade" id="modalDeleteAkun" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="formDeleteAkun" method="post">
                    @csrf
                    {{-- Gunakan method DELETE untuk menghapus data --}}
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel">Cancel Waste Submission</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to cancel the request for <span id="waste_type"></span>?
                        </div>
                        <div class="modal-footer" <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            No</button>
                            <button type="submit" class="btn btn-danger">Yes, Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Menambahkan script untuk modal delete --}}
    @push('script')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            function showModal(id, waste_type) {
                // Mengganti ID pada route untuk delete
                let action = '{{ route('waste.delete', ':id') }}';
                action = action.replace(':id', id);
                $('#formDeleteAkun').attr('action', action);
                $('#waste_type').text(waste_type);
                $('#modalDeleteAkun').modal('show');
            };

            let no = 2;
            $('#btn-more').on('click', function() {
                let elSelect = `
    <h4>No ${no}</h4>
    <div class="form-group mb-3">
        <label for="waste_type_${no}">Waste Type</label>
        <select name="waste_type[]" id="waste_type_${no}" class="form-control" required>
            <option value="" selected disabled>Select Waste Type</option>
            <option value="plastic">Plastic</option>
            <option value="paper">Paper</option>
            <option value="metal">Metal</option>
            <option value="glass">Glass</option>
            <option value="organic">Organic</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="quantity_${no}">Quantity (kg)</label>
        <input type="number" name="quantity[]" id="quantity_${no}" class="form-control" step="0.1"
            min="0.1" required>
    </div>`;

                $('#waste-more').append(elSelect);

                no++;
            })
        </script>
    @endpush
@endsection
