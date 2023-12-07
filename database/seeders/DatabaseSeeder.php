<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Dennis Tandelon',
            'email' => 'dennis.tandelon@macaron.com',
            'password' => bcrypt('random')
        ]);

        \DB::table('profiles')->insert([
            'name' => 'Dennis Tandelon',
            'email' => 'dennis.tandelon@macaron.com',
            'phone' => '0123456789',
            'address'=>'rumah',
            'image_url' => '/images/macarons/mint macaron.jpg'
        ]);

        \DB::table('carts')->insert([
            'user_id' => 1,
            'name' => 'Mint Macaron',
            'description' => 'Cold feeling from the breeze of Minty tasty macaronies slap my shivering cakes. The actual cake...',
            'price' => 369000,
            'amount' => 5,
            'image_url' => '/images/macarons/mint macaron.jpg',

        ]);

        \DB::table('carts')->insert([
            'user_id' => 1,
            'name' => 'Lemon Macaron',
            'description' => 'Sour',
            'price' => 2000,
            'amount' => 2,
            'image_url' => '/images/macarons/lemon macaron.jpeg',

        ]);

        \DB::table('histories')->insert([
            'user_id' => 1,
            'transaction_date' => date('Y-m-d H:i:s'),
        ]);

        \DB::table('history_details')->insert([
            'history_id' => 1,
            'item_name' => 'Shido',
            'item_price' => '70000',
            'quantity' => '2'
        ]);

        \DB::table('history_details')->insert([
            'history_id' => 1,
            'item_name' => 'Mio',
            'item_price' => '100000',
            'quantity' => '2'
        ]);

        \DB::table('macarons')->insert([
            'name' => 'Mint Macaron',
            'Description' => 'Cold feeling from the breeze of Minty tasty macaronies slap my shivering cakes. The actual cake...',
            'price' => 369000,
            'ratings' => 5,
            'flavor' => 'Sour',
            'category' => 'Yes#Poop',
            'image_url' => 'https://res.cloudinary.com/dotj27nru/image/upload/v1701606247/users/Dennis%20Tandelon.png'
        ]);

        $this->call(MacaronSeeder::class);
    }
}
