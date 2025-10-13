@extends('layouts.mainlayout')

@section('title', 'Kontak - Hadassa Mur & Baut')

@section('content')

{{-- HERO / HEADER --}}
<section class="section-padding text-center position-relative"
    style="background: linear-gradient(rgba(27,47,102,0.7), rgba(27,47,102,0.7)), url('{{ asset('images/gallery/hadassaHero3.png') }}') center/cover no-repeat; min-height: 350px;">
    <div class="container d-flex flex-column justify-content-center h-100 text-white pt-5">
        <h1 class="display-4 mt-5 fw-bold">Hubungi Kami</h1>
        <p class="lead mt-3">Toko Mur, Baut & Alat Teknik Terpercaya di Lumajang</p>
    </div>
</section>

{{-- INFO TENTANG TOKO --}}
<section class="section-padding py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="color:#1b2f66;">Informasi Toko</h2>
        <div class="row g-4 justify-content-center text-center">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 p-3 border-0">
                    <i class="bi bi-geo-alt-fill display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Alamat</h5>
                    <p class="mb-0">Jl. Kapten Suwandak No.47, Ditotrunan, Lumajang, Jawa Timur 67316</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 p-3 border-0">
                    <i class="bi bi-clock-fill display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Jam Operasional</h5>
                    <p class="mb-0">Setiap hari 07:00 - 16:30</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 p-3 border-0">
                    <i class="bi bi-telephone-fill display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Telepon</h5>
                    <p class="mb-0">0852-0401-0334</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 p-3 border-0">
                    <i class="bi bi-calendar-fill display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Berdiri Sejak</h5>
                    <p class="mb-0">2016</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MAPS + SOSIAL MEDIA --}}
<section class="section-padding bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color:#1b2f66;">Lokasi & Sosial Media</h2>

        <div class="row g-4 align-items-start">
            {{-- MAPS --}}
            <div class="col-12 col-lg-8">
                <div class="ratio ratio-16x9 rounded shadow-sm overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.123456!2d113.234567!3d-8.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x123456789abcdef!2sHadassa%20Mur%20%26%20Baut!5e0!3m2!1sen!2sid!4v1697190000000!5m2!1sen!2sid" 
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            {{-- SOSIAL MEDIA --}}
            <div class="col-12 col-lg-4 d-flex flex-column align-items-center align-items-lg-start">
                <h5 class="mb-3 fw-bold" style="color:#1b2f66;">Ikuti Kami</h5>
                <p class="mb-4 text-center text-lg-start" style="color:#1b2f66;">
                    Dapatkan info terbaru & promo menarik melalui sosial media kami
                </p>

                <div class="d-flex flex-column gap-2 w-100">
                    <a href="https://www.instagram.com/hadassa.murbaut" target="_blank" 
                    class="btn d-flex align-items-center gap-2 justify-content-center justify-content-lg-start fw-medium w-100"
                    style="background-color:#1b2f66; color:#f2ede1; border-radius: 50px; padding:0.6rem 1.2rem; font-size:1.05rem;">
                        <i class="bi bi-instagram"></i> <span>Instagram</span>
                    </a>
                    <a href="https://www.facebook.com/tokohadassalumajang" target="_blank" 
                    class="btn d-flex align-items-center gap-2 justify-content-center justify-content-lg-start fw-medium w-100"
                    style="background-color:#1b2f66; color:#f2ede1; border-radius: 50px; padding:0.6rem 1.2rem; font-size:1.05rem;">
                        <i class="bi bi-facebook"></i> <span>Facebook</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
