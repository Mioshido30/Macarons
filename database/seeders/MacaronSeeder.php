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
        $macarons = [
            [
                'name' => 'Rainbow Macaron',
                'description' => "Macaron made with rainbow flavors... Rainbows... Yum.. G.. yum... G... Not what you're thinking okay...",
                'price' => 10000,
                'ratings' => 4,
                'image_url' => '/images/macarons/rainbow macaron.jpeg',
                'flavor' => 'Rainbow',
                'category' => '-#-#Premium#-'
            ],
            [
                'name' => 'Tiramisu Macaron',
                'description' => "I believe in love at first sight between a person and tiramisu. Tiramisu is like a rush of emotions for your taste buds.",
                'price' => 15000,
                'ratings' => 5,
                'image_url' => '/images/macarons/tiramisu macaron.jpeg',
                'flavor' => 'Chocolate',
                'category' => 'Yes#Seasonal#-#-'
            ],
            [
                'name' => 'Lemon Macaron',
                'description' => "“Life isn't just about getting lemons out of it. An unexpected turn and a kind smile warms you up on the coldest of days.”, quoted by Lemon-chan.",
                'price' => 90000,
                'ratings' => 4,
                'image_url' => '/images/macarons/lemon macaron.jpeg',
                'flavor' => 'Fruity',
                'category' => '-#Seasonal#-#-'
            ],
            [
                'name' => 'Mocha Macaron',
                'description' => "Coffee flavored macarons makes me up HARD every morning and night. Not sus btw.",
                'price' => 7000,
                'ratings' => 4,
                'image_url' => '/images/macarons/mocha macaron.jpg',
                'flavor' => 'Chocolate',
                'category' => '-#-#-#-'
            ],
            [
                'name' => 'Bear Macaron',
                'description' => "Bear Macarons... You could say the are BEARy cute... Hahaha... unBEARably funny I must say...",
                'price' => 12000,
                'ratings' => 5,
                'image_url' => '/images/macarons/bear macaron.jpeg',
                'flavor' => 'Chocolate',
                'category' => 'Yes#Seasonal#-#-'
            ],
            [
                'name' => 'Orange Macaron',
                'description' => "Orange is the color of truth. When I think of flavor, I think of color. Orange is orange...",
                'price' => 9000,
                'ratings' => 4,
                'image_url' => '/images/macarons/orange macaron.jpeg',
                'flavor' => 'Fruity',
                'category' => 'Yes#Seasonal#-#-'
            ],
            [
                'name' => 'Vogue Macaron',
                'description' => "Vogue is an art. It lives through the trend of fashion. Do any pose and that's Vogue right there...",
                'price' => 79000,
                'ratings' => 5,
                'image_url' => '/images/macarons/vogue macaron.png',
                'flavor' => 'Rainbow',
                'category' => 'Yes#-#Premium#New'
            ],
            [
                'name' => 'Mint Macaron',
                'description' => "Cold feeling from the breeze of Minty tasty macaronies slap my shivering cakes. The actual cake...",
                'price' => 9000,
                'ratings' => 3,
                'image_url' => '/images/macarons/mint macaron.jpg',
                'flavor' => 'Vanilla',
                'category' => '-#-#-#-'
            ],
            [
                'name' => 'Strawberry Macaron',
                'description' => "You don’t need a fishy sports car or the latest smartphone to live. Pick up a simple strawberry and bite into it...",
                'price' => 12000,
                'ratings' => 4,
                'image_url' => '/images/macarons/strawberry macaron.jpeg',
                'flavor' => 'Fruity',
                'category' => '-#Seasonal#-#-'
            ],
            [
                'name' => 'Sushi Macaron',
                'description' => "Life without you is like sushi without rice… or macaron crust… or meringue…",
                'price' => 49000,
                'ratings' => 5,
                'image_url' => '/images/macarons/sushi macaron.jpeg',
                'flavor' => 'Vanilla',
                'category' => 'Yes#-#-#New'
            ],
            [
                'name' => 'Halloween Macaron',
                'description' => "Trick or treat, I'm walking the streets, searching for neighbors with good candy to eat.",
                'price' => 66666,
                'ratings' => 5,
                'image_url' => '/images/macarons/halloween macaron.jpeg',
                'flavor' => 'Chocolate',
                'category' => '-#Seasonal#-#New'
            ],
            [
                'name' => 'Burger Macaron',
                'description' => "Life is too short to miss out on beautiful things like a double cheeseburger...",
                'price' => 26000,
                'ratings' => 5,
                'image_url' => '/images/macarons/burger macaron.jpeg',
                'flavor' => 'Chocolate',
                'category' => 'Yes#-#-#New'
            ],
            [
                'name' => 'Pokemon Macaron',
                'description' => "“Every day, I brush my Pokemon a hundred strokes. Then, I do me.” says the losing-soon challenger.",
                'price' => 29000,
                'ratings' => 5,
                'image_url' => '/images/macarons/pokemon macaron.jpeg',
                'flavor' => 'Rainbow',
                'category' => 'Yes#Seasonal#Premium#New'
            ],
        ];

        \DB::table('macarons')->delete();
        \DB::table('macarons')->insert($macarons);

    }
}
