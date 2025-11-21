@extends('layouts.mainlayout')

@section('title', 'Register - Hadassa Mur & Baut')

@section('content')
<section class="section-padding py-5" style="background-color: #f9f5ee; min-height:70vh;">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width:520px; border-radius:12px;">
            <h4 class="text-center mb-4" style="color:#1b2f66;">Buat Akun</h4>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama lengkap"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
                    </div>
                </div>

                <button class="btn w-100 text-white" style="background-color:#1b2f66;">Daftar</button>
            </form>

            <div class="text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-decoration-none" style="color:#1b2f66;">Login</a>
            </div>
        </div>
    </div>
</section>
@endsection