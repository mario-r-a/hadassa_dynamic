@extends('layouts.mainlayout')

@section('title', 'Profil Saya - Hadassa Mur & Baut')

@section('content')
<section class="section-padding py-5" style="background-color:#f9f5ee; min-height:70vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-4" style="border-radius:12px;">
                    <div class="d-flex align-items-center gap-4">
                        <div style="width:96px; height:96px; border-radius:12px; background:#f2ede1; display:flex; align-items:center; justify-content:center; font-weight:700; color:#1b2f66;">
                            {{ Str::upper(substr(Auth::user()->name ?? 'U',0,1)) }}
                        </div>
                        <div>
                            <h4 class="mb-0" style="color:#1b2f66;">{{ Auth::user()->name ?? 'Pengguna' }}</h4>
                            <p class="text-muted mb-0">{{ Auth::user()->email ?? '-' }}</p>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 style="color:#1b2f66;">Informasi Akun</h5>
                    <dl class="row">
                        <dt class="col-sm-4 text-muted">Nama</dt>
                        <dd class="col-sm-8">{{ Auth::user()->name ?? '-' }}</dd>

                        <dt class="col-sm-4 text-muted">Email</dt>
                        <dd class="col-sm-8">{{ Auth::user()->email ?? '-' }}</dd>

                        <dt class="col-sm-4 text-muted">Bergabung</dt>
                        <dd class="col-sm-8">{{ optional(Auth::user()->created_at)->format('d M Y') ?? '-' }}</dd>
                    </dl>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('profile.password.edit') }}" class="btn btn-outline-secondary">Ubah Password</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn" style="background-color:#d97582; color:#fff;">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection