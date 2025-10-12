<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "Bearing",
            'description' => "Bearing adalah komponen yang digunakan untuk mengurangi gesekan antara dua bagian yang bergerak, seperti roda atau poros, sehingga pergerakan menjadi lebih halus dan efisien. Bearing sering dipakai di mesin atau kendaraan untuk mendukung kinerja dan daya tahan.",
        ]);
        DB::table('categories')->insert([
            'name' => "Mata Gerinda",
            'description' => "Mata gerinda adalah alat potong berbentuk roda yang terbuat dari bahan abrasif, digunakan untuk menghaluskan, memotong, atau membentuk material keras seperti logam atau batu. Mata gerinda banyak digunakan di bengkel atau industri untuk proses pemotongan dan perataan permukaan.",
        ]);
        DB::table('categories')->insert([
            'name' => "Alat Teknik",
            'description' => "Alat teknik adalah berbagai peralatan yang digunakan untuk pekerjaan teknis, seperti pemotongan, pengeboran, pengelasan, atau perakitan, yang biasanya digunakan di bidang industri atau konstruksi. Alat-alat ini membantu mempermudah pekerjaan teknik dan meningkatkan presisi hasilnya.",
        ]);
        DB::table('categories')->insert([
            'name' => "Lainnya",
            'description' => null,
        ]);
    }
}
