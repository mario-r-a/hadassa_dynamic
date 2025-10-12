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
            'product_id' => 1,
            'image_path' => "/images/products/bearing/detail/product1_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'image_path' => "/images/products/bearing/detail/product1_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'image_path' => "/images/products/bearing/detail/product1_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 2,
            'image_path' => "/images/products/bearing/detail/product2_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 2,
            'image_path' => "/images/products/bearing/detail/product2_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 2,
            'image_path' => "/images/products/bearing/detail/product2_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 3,
            'image_path' => "/images/products/bearing/detail/product3_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 3,
            'image_path' => "/images/products/bearing/detail/product3_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 4,
            'image_path' => "/images/products/bearing/detail/product4_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 4,
            'image_path' => "/images/products/bearing/detail/product4_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 4,
            'image_path' => "/images/products/bearing/detail/product4_detail3.jpeg",
        ]);

        //MATA GERINDA
        DB::table('product_photos')->insert([
            'product_id' => 5,
            'image_path' => "/images/products/mataGerinda/detail/product5_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 5,
            'image_path' => "/images/products/mataGerinda/detail/product5_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 6,
            'image_path' => "/images/products/mataGerinda/detail/product6_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 6,
            'image_path' => "/images/products/mataGerinda/detail/product6_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 6,
            'image_path' => "/images/products/mataGerinda/detail/product6_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 7,
            'image_path' => "/images/products/mataGerinda/detail/product7_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 7,
            'image_path' => "/images/products/mataGerinda/detail/product7_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 7,
            'image_path' => "/images/products/mataGerinda/detail/product7_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 8,
            'image_path' => "/images/products/mataGerinda/detail/product8_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 8,
            'image_path' => "/images/products/mataGerinda/detail/product8_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 8,
            'image_path' => "/images/products/mataGerinda/detail/product8_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 8,
            'image_path' => "/images/products/mataGerinda/detail/product8_detail4.jpeg",
        ]);

        //ALAT TEKNIK
        DB::table('product_photos')->insert([
            'product_id' => 9,
            'image_path' => "/images/products/alatTeknik/detail/product9_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 9,
            'image_path' => "/images/products/alatTeknik/detail/product9_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 9,
            'image_path' => "/images/products/alatTeknik/detail/product9_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 9,
            'image_path' => "/images/products/alatTeknik/detail/product9_detail4.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 10,
            'image_path' => "/images/products/alatTeknik/detail/product10_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 10,
            'image_path' => "/images/products/alatTeknik/detail/product10_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 10,
            'image_path' => "/images/products/alatTeknik/detail/product10_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 10,
            'image_path' => "/images/products/alatTeknik/detail/product10_detail4.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 11,
            'image_path' => "/images/products/alatTeknik/detail/product11_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 11,
            'image_path' => "/images/products/alatTeknik/detail/product11_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 11,
            'image_path' => "/images/products/alatTeknik/detail/product11_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 11,
            'image_path' => "/images/products/alatTeknik/detail/product11_detail4.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 12,
            'image_path' => "/images/products/alatTeknik/detail/product12_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 12,
            'image_path' => "/images/products/alatTeknik/detail/product12_detail2.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 12,
            'image_path' => "/images/products/alatTeknik/detail/product12_detail3.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 12,
            'image_path' => "/images/products/alatTeknik/detail/product12_detail4.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 13,
            'image_path' => "/images/products/alatTeknik/detail/product13_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 13,
            'image_path' => "/images/products/alatTeknik/detail/product13_detail2.jpeg",
        ]);

        //LAINNYA
        DB::table('product_photos')->insert([
            'product_id' => 14,
            'image_path' => "/images/products/lainnya/detail/product14_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 15,
            'image_path' => "/images/products/lainnya/detail/product15_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 16,
            'image_path' => "/images/products/lainnya/detail/product16_detail1.jpeg",
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 17,
            'image_path' => "/images/products/lainnya/detail/product17_detail1.jpeg",
        ]);
    }
}
