<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Only user member
        $users = User::where('status', 'member')->take(4)->get();

        // Content review
        $contents = [
            'Toko mur baut terlengkap di Lumajang, pelayanan cepat dan ramah.',
            'Harga bersahabat dan pilihan baut sangat lengkap.',
            'Tempat langganan, selalu puas dengan kualitas barangnya.',
            'Pelayanannya bagus, toko sangat direkomendasikan.',
        ];

        $ratings = [5, 5, 4, 5];

        foreach ($users as $i => $user) {
            Review::create([
                'user_id' => $user->id,
                'content' => $contents[$i],
                'rating'  => $ratings[$i],
            ]);
        }
    }
}
