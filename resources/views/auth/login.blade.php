@extends('layouts.mainlayout')

@section('title', 'Login - Hadassa Mur & Baut')

@section('content')
<section class="section-padding py-5" style="background-color: #f9f5ee; min-height:70vh;">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width:420px; border-radius:12px;">
            <h4 class="text-center mb-4" style="color:#1b2f66;">Login</h4>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                        value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    <div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none small">Lupa password?</a>
                        @endif
                    </div>
                </div>

                <button class="btn w-100 text-white" style="background-color:#1b2f66;">Login</button>
            </form>

            <div class="text-center mt-4">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-decoration-none" style="color:#1b2f66;">Register</a>
            </div>
        </div>
    </div>
</section>
@endsection