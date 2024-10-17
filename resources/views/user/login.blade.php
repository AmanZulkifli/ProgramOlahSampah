@extends('layouts.app')

@section('content')
    


<div class="container mt-5" style="padding-top: 100px; height : 100vh; ">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <h3 class="text-center text-light">Login</h3>
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('landingpage') }}" class="btn btn-danger">Back</a>
                        <p class="text-white mt-3">Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

