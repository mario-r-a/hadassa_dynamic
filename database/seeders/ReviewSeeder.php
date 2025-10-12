<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'name' => "Yudi Puri",
            'content' => "Toko mur baut terlengkap di Lumajang, hampir semua jenis tersedia. Harga relatif murah, tersedia juga tools merk tekiro.. Parkiran mobil agak susah, di bahu jalan.. Lokasi toko strategis berada di jalan protokol",
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'name' => "Papa Timi",
            'content' => "Jual bermacam macam baut mur dan alat-alat teknik yang cukup lengkap. Sepertinya pemilik toko tidak mengutamakan untung banyak 👍",
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'name' => "Soesilo",
            'content' => "Toko khusus mur baut segala macam ukuran, harga relatif murah/sesuai kualitas. Layanan cepat & ramah",
            'rating' => 4,
        ]);
        DB::table('reviews')->insert([
            'name' => "Sumarni",
            'content' => "Murah meriah dan terlengkap di Lumajang. Pinggir jalan dan pelayanan maksimal",
            'rating' => 4,
        ]);
        DB::table('reviews')->insert([
            'name' => "Dewa Permata",
            'content' => "Berbagai macan bentuk mur dan baut ada di sana. Lengkap",
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'name' => "Sumarni",
            'content' => "Murah meriah dan terlengkap di Lumajang. Pinggir jalan dan pelayanan maksimal",
            'rating' => 4,
        ]);
        DB::table('reviews')->insert([
            'name' => "Ongkowidjaja",
            'content' => "Jual alat tehnik lengkap di Lumajang",
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'name' => "Wasaga",
            'content' => "Toko murah baut yg cukup lengkap",
            'rating' => 5,
        ]);
    }
}
