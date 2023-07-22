<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                [
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('password'),
                    'roles' => 'adm',
                ],[
                    'name' => 'Kepsek',
                    'username' => 'kepsek',
                    'email' => 'kepsek@gmail.com',
                    'password' => Hash::make('password'),
                    'roles' => 'kepsek',
            ]
            ];

            foreach ($user as $key => $value) {
                # code...
                User::create($value);
            }
    }
}
