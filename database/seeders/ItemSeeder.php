<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'id'    => 1,
                'name' => 'Arduino',
                'date' => date_create(),
                'quantity' => rand(1, 1000),
                'unit' => 'pcs',
                'category_id' => 1
            ],
            [
                'id'    => 2,
                'name' => 'WEMOS',
                'date' => date_create(),
                'quantity' => rand(1, 1000),
                'unit' => 'pcs',
                'category_id' => 1
            ],
            [
                'id'    => 3,
                'name' => 'Resistor',
                'date' => date_create(),
                'quantity' => rand(1, 1000),
                'unit' => 'pcs',
                'category_id' => 1
            ],
            [
                'id'    => 4,
                'name' => 'Meja',
                'date' => date_create(),
                'quantity' => rand(1, 1000),
                'unit' => 'Buah',
                'category_id' => 2
            ],
            [
                'id'    => 5,
                'name' => 'Obeng',
                'date' => date_create(),
                'quantity' => rand(1, 1000),
                'unit' => 'pcs',
                'category_id' => 3
            ],
            [
                'id'    => 6,
                'name' => 'Kursi',
                'date' => date_create(),
                'quantity' => rand(1, 1000),
                'unit' => 'buah',
                'category_id' => 2
            ],
            
        ];
        Item::insert($category);
    }
}
