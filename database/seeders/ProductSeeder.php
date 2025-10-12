<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // BEARING
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => "Roller Bearing Koyo",
            'description' => "Bearing merk Koyo dengan tipe 22308 RHAW33 Diameter dalam 40mm/4cm diameter luar 90mm/9cm tebal 35mm/3,5cm dan berat 1339gr/1,34kg.",
            'main_image' => "images/products/bearing/main/product1_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => "Roller Bearing Koyo",
            'description' => "Bearing merk Koyo dengan tipe 30210 JR dengan diameter dalam 50mm/5cm diameter luar 90mm/9cm tebal 22mm/2,2cm berat 722gr/0,72kg.",
            'main_image' => "images/products/bearing/main/product2_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => "Roller Bearing Nachi",
            'description' => "Bearing merk Nachi tipe 6302-2NSE diameter dalam 15mm/1,5cm diameter luar 42mm/4,2cm tebal 13mm/1,3cm berat 111gr.",
            'main_image' => "images/products/bearing/main/product3_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => "Ball Bearing Nachi",
            'description' => "Bearing merk Nachi tipe 6203 c3 diameter dalam 17mm/1,7cm diameter luar 40mm/4cm tebal 12mm/1,2cm berat 91gr.",
            'main_image' => "images/products/bearing/main/product4_main.jpeg"
        ]);
        
        // MATA GERINDA
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => "Mata Gerinda WD",
            'description' => "Mata Gerinda merk WD dengan ukuran 105x1.2x16mm dapat digunakan pada gerinda tangan ukuran 4” untuk memotong besi, baja, baja stainless kecepatan maksimum 14560rpm atau 80m/detik.",
            'main_image' => "images/products/mataGerinda/main/product5_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => "Mata Gerinda Maktec",
            'description' => "Mata Gerinda merk Maktec ukuran 4”/110mm arbor 20mm dengan tipe wet & dry untuk keramik dan granit.",
            'main_image' => "images/products/mataGerinda/main/product6_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => "Mata Gerinda Wipro",
            'description' => "Mata Gerinda merk Wipro dengan tipe DWTT-105S ukuran 4”/105mm arbor 20mm kecepatan maksimal di 13.600 RPM untuk granit, beton, bata, keramik, porselen, dan ubin.",
            'main_image' => "images/products/mataGerinda/main/product7_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => "Mata Gerinda Kinik",
            'description' => "Mata Gerinda merk Kinik isi 10pcs ukuran 105x1x16mm super tipis dan tajam untuk baja dan stainless dengan kecepatan maksimal di 15.200 RPM.",
            'main_image' => "images/products/mataGerinda/main/product8_main.jpeg"
        ]);

        // ALAT TEKNIK
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => "Sprayer Jet Cleaner Doziro",
            'description' => "Sprayer Jet merk Doziro debit air 2.5L/menit maksimal tekanan di 23bar panjang selang 5m baterai Li-ion 24v panjang stik 15cm.",
            'main_image' => "images/products/alatTeknik/main/product9_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => "Mesin Amplas Wipro",
            'description' => "Mesin Amplas merk Wipro dengan daya 370Watt Voltase 220V frekuensi 50hz kecepatan 2850rpm ukuran amplas bulat 150mm/6” ukuran amplas sabuk 100x914mm/4x36”.",
            'main_image' => "images/products/alatTeknik/main/product10_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => "Paku Tembak Elektrik Modern",
            'description' => "Paku Tembak Elektrik merk Modern dengan voltase 230-240v, frekuensi 50hz panjang kabel 2m kapasitas paku 100pcs kemampuan tembak 20/menit dengan berat 2.5kg.",
            'main_image' => "images/products/alatTeknik/main/product11_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => "Bor Tangan Ryu",
            'description' => "Bor Tangan merk Ryu dengan daya 370Watt voltase 220v frekuensi 50hz kecepatan 0-3.200 rpm kapasitas mata bor 10mm dengan kelengkapan fisher, cutter, box, pensil, sarung tangan, obeng bolak balik, meteran 2m, batu osco, mata bor, dan sekrup.",
            'main_image' => "images/products/alatTeknik/main/product12_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => "Mesin Gerinda Lazaro",
            'description' => "Mesin Gerinda merk Lazaro L-91 dengan spesifikasi daya 540Watt voltase 220-230V arus 2.5A frekuensi 50-60hz dengan diameter batu gerinda 100mm/4” kecepatan tanpa beban 1200rpm.",
            'main_image' => "images/products/alatTeknik/main/product13_main.jpeg"
        ]);

        // LAINNYA
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => "",
            'description' => ".",
            'main_image' => "images/products/lainnya/main/product14_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => "",
            'description' => ".",
            'main_image' => "images/products/lainnya/main/product15_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => "",
            'description' => ".",
            'main_image' => "images/products/lainnya/main/product16_main.jpeg"
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => "",
            'description' => ".",
            'main_image' => "images/products/lainnya/main/product17_main.jpeg"
        ]);
    }
}
