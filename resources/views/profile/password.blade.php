@extends('layouts.mainlayout')

@section('title', 'Ubah Password - Hadassa Mur & Baut')

@section('content')
<section class="section-padding py-5" style="background-color:#f9f5ee; min-height:70vh;">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="width:520px; border-radius:12px;">
      <h4 class="text-center mb-4" style="color:#1b2f66;">Ubah Password</h4>

      @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('profile.password.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
          <label class="form-label">Password Saat Ini</label>
          <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
          @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password Baru</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Konfirmasi Password Baru</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="d-flex gap-2">
          <button class="btn w-100 text-white" style="background-color:#1b2f66;">Simpan</button>
          <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection