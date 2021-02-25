<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $category = [
            [
                'id'    => 1,
                'name' => 'Komponen',
            ],
            [
                'id'    => 2,
                'name' => 'Inventaris',
            ],
            [
                'id'    => 3,
                'name' => 'Alat',
            ],
        ];
        Category::insert($category);
    }
}
