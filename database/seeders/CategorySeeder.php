<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Hot',
                'image' => 'https://cdn2.iconfinder.com/data/icons/coffee-shop-4/128/yumminky-coffee-40-64.png'
            ],
            [
                'name' => 'Cold',
                'image' => 'https://cdn4.iconfinder.com/data/icons/fast-food-234/512/fast_food-16-64.png'
            ],
            [
                'name' => 'Snack',
                'image' => 'https://cdn0.iconfinder.com/data/icons/foods-49/128/onion_ring_snack_crispy_cuisine-64.png'
            ],
        ];

        foreach ($data as $item) {
            Category::insert([
                'name' => $item['name'],
                'image' => $item['image'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
