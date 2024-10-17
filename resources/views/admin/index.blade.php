@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="padding: 150px 0;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Accounts</h2>
            <!-- Tombol untuk menambah akun baru -->
            <a href="{{ route('admin.add') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Akun
            </a>
        </div>

        <!-- Notifikasi untuk sukses dan gagal -->
        @if (Session::has('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('Success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('Failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('Failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tabel untuk menampilkan akun yang ada -->
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($users) && count($users) > 0)
                        @foreach ($users as $item)
                            <tr>
                                <!-- Perhitungan nomor baris sesuai dengan pagination -->
                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ ucfirst($item->role) }}</td>
                                <td>
                                    <!-- Tombol untuk mengedit akun -->
                                    <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <!-- Tombol untuk menghapus akun, memicu modal konfirmasi -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteAkun"
                                        onclick="showModal('{{ $item->id }}', '{{ $item->name }}')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <!-- Jika data akun kosong -->
                        <tr>
                            <td colspan="5" class="text-center">Data Akun Kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Navigasi pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $users->links() }} <!-- Pagination untuk paginate atau simplePaginate -->
        </div>

        <!-- Modal konfirmasi penghapusan akun -->
        <div class="modal fade" id="modalDeleteAkun" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form id="formDeleteAkun" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Konfirmasi Hapus Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Menampilkan nama akun yang akan dihapus -->
                            Apakah Anda yakin ingin menghapus akun <strong id="nama_akun"></strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Script untuk menangani penghapusan akun -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Fungsi untuk menampilkan modal dan mengisi action URL serta nama akun
        function showModal(id, name) {
            let action = '{{ route('admin.delete', ':id') }}';
            action = action.replace(':id', id); // Ganti placeholder :id dengan ID yang dihapus
            $('#formDeleteAkun').attr('action', action); // Set form action dengan URL yang benar
            $('#nama_akun').text(name); // Menampilkan nama akun di dalam modal
        }
    </script>
@endpush
