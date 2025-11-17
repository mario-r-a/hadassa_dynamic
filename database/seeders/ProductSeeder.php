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
            [
            'category_id' => 1,
                'name' => "Roller Bearing Koyo",
                'description' => "Bearing merk Koyo dengan tipe 22308 RHAW33 Diameter dalam 40mm/4cm diameter luar 90mm/9cm tebal 35mm/3,5cm dan berat 1339gr/1,34kg.",
                'main_image' => "product1_main.jpeg"
            ],
            [
                'category_id' => 1,
                'name' => "Roller Bearing Koyo",
                'description' => "Bearing merk Koyo tipe 30210 JR diameter dalam 50mm/5cm diameter luar 90mm/9cm tebal 22mm/2,2cm berat 722gr/0,72kg.",
                'main_image' => "product2_main.jpeg"
            ],
            [
                'category_id' => 1,
                'name' => "Roller Bearing Nachi",
                'description' => "Bearing merk Nachi tipe 6302-2NSE diameter dalam 15mm/1,5cm diameter luar 42mm/4,2cm tebal 13mm/1,3cm berat 111gr.",
                'main_image' => "product3_main.jpeg"
            ],
            [
                'category_id' => 1,
                'name' => "Ball Bearing Nachi",
                'description' => "Bearing merk Nachi tipe 6203 c3 diameter dalam 17mm/1,7cm diameter luar 40mm/4cm tebal 12mm/1,2cm berat 91gr.",
                'main_image' => "product4_main.jpeg"
            ],

            // MATA GERINDA
            [
                'category_id' => 2,
                'name' => "Mata Gerinda WD",
                'description' => "Mata Gerinda merk WD ukuran 105x1.2x16mm untuk gerinda tangan 4”.",
                'main_image' => "product5_main.jpeg"
            ],
            [
                'category_id' => 2,
                'name' => "Mata Gerinda Maktec",
                'description' => "Mata Gerinda merk Maktec 4”/110mm arbor 20mm wet & dry untuk keramik/granit.",
                'main_image' => "product6_main.jpeg"
            ],
            [
                'category_id' => 2,
                'name' => "Mata Gerinda Wipro",
                'description' => "Mata Gerinda merk Wipro DWTT-105S ukuran 4”/105mm arbor 20mm kecepatan maksimal 13.600 RPM.",
                'main_image' => "product7_main.jpeg"
            ],
            [
                'category_id' => 2,
                'name' => "Mata Gerinda Kinik",
                'description' => "Mata Gerinda merk Kinik isi 10pcs ukuran 105x1x16mm super tipis untuk baja/stainless.",
                'main_image' => "product8_main.jpeg"
            ],

            // ALAT TEKNIK
            [
                'category_id' => 3,
                'name' => "Sprayer Jet Cleaner Doziro",
                'description' => "Sprayer Jet Doziro debit air 2.5L/menit tekanan maksimal 23bar panjang selang 5m baterai Li-ion 24v panjang stik 15cm.",
                'main_image' => "product9_main.jpeg"
            ],
            [
                'category_id' => 3,
                'name' => "Mesin Amplas Wipro",
                'description' => "Mesin Amplas Wipro 370W, 220V, 2850rpm ukuran bulat 150mm, sabuk 100x914mm.",
                'main_image' => "product10_main.jpeg"
            ],
            [
                'category_id' => 3,
                'name' => "Paku Tembak Elektrik Modern",
                'description' => "Paku Tembak Elektrik Modern 230-240v, kapasitas paku 100pcs, panjang kabel 2m.",
                'main_image' => "product11_main.jpeg"
            ],
            [
                'category_id' => 3,
                'name' => "Bor Tangan Ryu",
                'description' => "Bor Tangan Ryu 370W 220v 0-3.200 rpm, kelengkapan fisher, cutter, box, obeng, meteran, batu osco, mata bor, sekrup.",
                'main_image' => "product12_main.jpeg"
            ],
            [
                'category_id' => 3,
                'name' => "Mesin Gerinda Lazaro",
                'description' => "Mesin Gerinda Lazaro L-91 540W 220-230V arus 2.5A diameter batu 100mm kecepatan tanpa beban 1200rpm.",
                'main_image' => "product13_main.jpeg"
            ],

            // LAINNYA
            [
                'category_id' => 4,
                'name' => "Baut Blok Mesin 6x70mm",
                'description' => "Baut Blok Mesin 6x70mm diameter 6mm panjang 70mm bahan besi warna putih berat 22gr.",
                'main_image' => "product14_main.jpeg"
            ],
            [
                'category_id' => 4,
                'name' => "Baut Bak Truk 5/16\" x 5-1/2",
                'description' => "Baut Bak Truk 5/16\" x 5-1/2 warna hitam bahan besi berat 72gr.",
                'main_image' => "product15_main.jpeg"
            ],
            [
                'category_id' => 4,
                'name' => "Baut Blok Mesin 6x60mm",
                'description' => "Baut Blok Mesin 6x60mm warna putih bahan besi berat 20gr.",
                'main_image' => "product16_main.jpeg"
            ],
            [
                'category_id' => 4,
                'name' => "Gembok Panjang Tekiro",
                'description' => "Gembok Panjang Tekiro GT-PL1438 ukuran 60mm tahan karat 100% silinder tembaga.",
                'main_image' => "product17_main.jpeg"
            ]
        ]);
    }
}
