<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::insert(
            [
                [
                    'number'=> '112321',
                    'make'=> 'china',
                    'model'=> 'nisan',
                    'user_id'=> '1',
                ]
            ]
        );
    }
}
