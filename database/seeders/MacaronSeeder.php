<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MacaronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('macarons')->insert([
            'name' => 'Mint Macaron',
            'Description' => 'Cold feeling from the breeze of Minty tasty macaronies slap my shivering cakes. The actual cake...',
            'price' => 369000,
            'ratings' => 5,
            'image_url' => '/images/macarons/mint macaron.jpg'
        ]);

    }
}
