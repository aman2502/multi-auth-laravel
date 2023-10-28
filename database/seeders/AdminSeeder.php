<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name'=> 'admin',
                'email'=> 'admin@gmail.com',
                'password'=> 'password',
                'role_id'=> 1
            ]
        ];

        foreach($admins as $admin){
            $exist = \App\Models\Admin::where('email', $admin['email'])->first();
            if(empty($exist)){
                \App\Models\Admin::firstOrCreate([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => bcrypt($admin['password']),
                    'role_id'=> $admin['role_id'],
                ]);
            }
        }
    }
}
