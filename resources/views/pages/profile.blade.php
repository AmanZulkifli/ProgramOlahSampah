@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 100px 0;">
        <!-- Header Profil -->
        <div class="container d-flex">
            <!-- Gambar profil, menggunakan gambar default jika tidak ada -->
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://via.placeholder.com/120' }}"
                alt="Foto Profil" height="120" style="border-radius: 100%;">

            <!-- Informasi dasar profil -->
            <div class="profile-header mb-5 d-flex flex-column ml-3">
                <h2>{{ Auth::user()->name }}</h2>
                <p class="text-muted">Email: {{ Auth::user()->email }}</p>
                <p class="text-muted">Bergabung Sejak: {{ Auth::user()->created_at->format('F j, Y') }}</p>
            </div>
        </div>

        <!-- Bagian untuk memperbarui foto profil -->
        <div class="profile-info">
            <h4>Perbarui Foto Profil</h4>
            <form action="{{ route('profile.updatePicture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <!-- Input untuk unggah file foto profil -->
                    <input type="file" name="profile_picture" class="form-control-file">
                    <!-- Menampilkan pesan error jika ada kesalahan input -->
                    @error('profile_picture')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Perbarui Foto</button>
            </form>
        </div>

        <!-- Statistik Pengguna -->
        <h4 class="mt-5">Statistik</h4>
        <div class="row text-center">
            <!-- Total Sampah yang Dikirim -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Sampah Dikirim</h5>
                        <p class="card-text font-weight-bold">{{ $totalWaste }} kg</p> <!-- Tampilkan total sampah -->
                    </div>
                </div>
            </div>

            <!-- Poin yang Diperoleh -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Poin Diperoleh</h5>
                        <p class="card-text font-weight-bold">{{ $points }}</p> <!-- Tampilkan poin -->
                    </div>
                </div>
            </div>

            <!-- Level Saat Ini -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Level Saat Ini</h5>
                        <p class="card-text font-weight-bold">{{ $level }}</p> <!-- Tampilkan level -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
