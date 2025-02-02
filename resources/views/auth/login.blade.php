@extends('layouts.master-without-nav')

@section('title', 'Login')

@section('css')
<style>
    .auth-page { min-height: 100vh; }
    .bg-primary { background-color: #435ebe !important; }
    .auth-logo img { max-height: 48px; }
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}" class="auth-logo mb-3 d-block">
                                <img src="{{ asset('assets/images/logo/logo-rsi.png') }}" alt="RSI Logo">
                            </a>
                            <h4>Selamat Datang!</h4>
                            <p class="text-muted">Silakan login untuk mengakses Sistem Parkir.</p>
                        </div>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="text-muted">© {{ date('Y') }} RSI Banjarnegara. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection