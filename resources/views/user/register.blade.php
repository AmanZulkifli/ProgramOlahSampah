@extends('layouts.app')

@section('content')
<body class="bg-dark">
    
    <div class="container mt-5" style="padding-top: 100px; height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="text-center text-white">Sign Up</h3>
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label Text-white">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label Text-white">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label Text-white">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('login') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
