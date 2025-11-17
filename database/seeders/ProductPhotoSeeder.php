<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //BEARING
        DB::table('product_photos')->insert([
            [
                'product_id' => 1,
                'image_path' => "product1_detail1.jpeg",
            ],
            [
                'product_id' => 1,
                'image_path' => "product1_detail2.jpeg",
            ],
            [
                'product_id' => 1,
                'image_path' => "product1_detail3.jpeg",
            ],
            [
                'product_id' => 2,
                'image_path' => "product2_detail1.jpeg",
            ],
            [
                'product_id' => 2,
                'image_path' => "product2_detail2.jpeg",
            ],
            [
                'product_id' => 2,
                'image_path' => "product2_detail3.jpeg",
            ],
            [
                'product_id' => 3,
                'image_path' => "product3_detail1.jpeg",
            ],
            [
                'product_id' => 3,
                'image_path' => "product3_detail2.jpeg",
            ],
            [
                'product_id' => 4,
                'image_path' => "product4_detail1.jpeg",
            ],
            [
                'product_id' => 4,
                'image_path' => "product4_detail2.jpeg",
            ],
            [
                'product_id' => 4,
                'image_path' => "product4_detail3.jpeg",
            ],

            //MATA GERINDA
            [
                'product_id' => 5,
                'image_path' => "product5_detail1.jpeg",
            ],
            [
                'product_id' => 5,
                'image_path' => "product5_detail2.jpeg",
            ],
            [
                'product_id' => 6,
                'image_path' => "product6_detail1.jpeg",
            ],
            [
                'product_id' => 6,
                'image_path' => "product6_detail2.jpeg",
            ],
            [
                'product_id' => 6,
                'image_path' => "product6_detail3.jpeg",
            ],
            [
                'product_id' => 7,
                'image_path' => "product7_detail1.jpeg",
            ],
            [
                'product_id' => 7,
                'image_path' => "product7_detail2.jpeg",
            ],
            [
                'product_id' => 7,
                'image_path' => "product7_detail3.jpeg",
            ],
            [
                'product_id' => 8,
                'image_path' => "product8_detail1.jpeg",
            ],
            [
                'product_id' => 8,
                'image_path' => "product8_detail2.jpeg",
            ],
            [
                'product_id' => 8,
                'image_path' => "product8_detail3.jpeg",
            ],
            [
                'product_id' => 8,
                'image_path' => "product8_detail4.jpeg",
            ],

            //ALAT TEKNIK
            [
                'product_id' => 9,
                'image_path' => "product9_detail1.jpeg",
            ],
            [
                'product_id' => 9,
                'image_path' => "product9_detail2.jpeg",
            ],
            [
                'product_id' => 9,
                'image_path' => "product9_detail3.jpeg",
            ],
            [
                'product_id' => 9,
                'image_path' => "product9_detail4.jpeg",
            ],
            [
                'product_id' => 10,
                'image_path' => "product10_detail1.jpeg",
            ],
            [
                'product_id' => 10,
                'image_path' => "product10_detail2.jpeg",
            ],
            [
                'product_id' => 10,
                'image_path' => "product10_detail3.jpeg",
            ],
            [
                'product_id' => 10,
                'image_path' => "product10_detail4.jpeg",
            ],
            [
                'product_id' => 11,
                'image_path' => "product11_detail1.jpeg",
            ],
            [
                'product_id' => 11,
                'image_path' => "product11_detail2.jpeg",
            ],
            [
                'product_id' => 11,
                'image_path' => "product11_detail3.jpeg",
            ],
            [
                'product_id' => 11,
                'image_path' => "product11_detail4.jpeg",
            ],
            [
                'product_id' => 12,
                'image_path' => "product12_detail1.jpeg",
            ],
            [
                'product_id' => 12,
                'image_path' => "product12_detail2.jpeg",
            ],
            [
                'product_id' => 12,
                'image_path' => "product12_detail3.jpeg",
            ],
            [
                'product_id' => 12,
                'image_path' => "product12_detail4.jpeg",
            ],
            [
                'product_id' => 13,
                'image_path' => "product13_detail1.jpeg",
            ],
            [
                'product_id' => 13,
                'image_path' => "product13_detail2.jpeg",
            ],

            //LAINNYA
            [
                'product_id' => 14,
                'image_path' => "product14_detail1.jpeg",
            ],
            [
                'product_id' => 14,
                'image_path' => "product14_detail2.jpeg",
            ],
            [
                'product_id' => 14,
                'image_path' => "product14_detail3.jpeg",
            ],
            [
                'product_id' => 14,
                'image_path' => "product14_detail4.jpeg",
            ],
            [
                'product_id' => 15,
                'image_path' => "product15_detail1.jpeg",
            ],
            [
                'product_id' => 15,
                'image_path' => "product15_detail2.jpeg",
            ],
            [
                'product_id' => 16,
                'image_path' => "product16_detail1.jpeg",
            ],
            [
                'product_id' => 16,
                'image_path' => "product16_detail2.jpeg",
            ],
            [
                'product_id' => 16,
                'image_path' => "product16_detail3.jpeg",
            ],
            [
                'product_id' => 17,
                'image_path' => "product17_detail1.jpeg",
            ],
            [
                'product_id' => 17,
                'image_path' => "product17_detail2.jpeg",
            ],
            [
                'product_id' => 17,
                'image_path' => "product17_detail3.jpeg",
            ]
        ]);
    }
}
