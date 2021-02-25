<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_access',
            ],
            [
                'id'    => 2,
                'title' => 'task_access',
            ],
            [
                'id'    => 3,
                'title' => 'item_access',
            ],
            [
                'id'    => 4,
                'title' => 'category_access',
            ],
            [
                'id'    => 5,
                'title' => 'user_item_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
