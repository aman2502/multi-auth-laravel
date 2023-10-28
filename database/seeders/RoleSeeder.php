<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'=> 'admin'
            ],
            [
                'name'=> 'user'
            ]
        ];

        foreach ($roles as $role) {
            $exist = Role::where('name', $role['name'])->first();
            if (empty($exist)) {
                Role::firstOrCreate([
                    'name' => $role['name']
                ]);
            }
        }
    }
}
