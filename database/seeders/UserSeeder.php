<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name'=> 'admin',
                    'midlename'=> '.',
                    'surname'=> '.',
                    'email'=> 'admin@mail.com',
                    'tel'=> '88005553535',
                    'role'=> 'admin',
                    'password'=> Hash::make('password'),
                    
                    
                ],
            ]
        );
    }
}
