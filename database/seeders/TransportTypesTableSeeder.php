<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportTypes = [
            [
                'id' => 1,
                'name' => "Фура для жидкостей",
                'image' => "images/transports/t_03.webp",
                'weight' => 12,
                'length' => 12,
                'height' => 3.6,
                'coefficent' => 5.5,
            ],
            [
                'id' => 2,
                'name' => "Фура",
                'image' => "images/transports/t_01.webp",
                'weight' => 20,
                'length' => 13,
                'height' => 3.6,
                'coefficent' => 5,
            ],
            [
                'id' => 3,
                'name' => "Открытая платформа",
                'image' => "images/transports/t_02.webp",
                'weight' => 1,
                'length' => 1,
                'height' => 1,
                'coefficent' => 1.5,
            ],
            [
                'id' => 4,
                'name' => "Газель",
                'image' => "images/transports/t_05.webp",
                'weight' => 2,
                'length' => 3,
                'height' => 1.8,
                'coefficent' => 2,
            ],
            [
                'id' => 5,
                'name' => "Газель 4 метра",
                'image' => "images/transports/t_04.webp",
                'weight' => 3,
                'length' => 4,
                'height' => 1.8,
                'coefficent' => 2.5,
            ],
            [
                'id' => 6,
                'name' => "Фургон",
                'image' => "images/transports/t_06.webp",
                'weight' => 2,
                'length' => 2.7,
                'height' => 1.4,
                'coefficent' => 1.5,
            ],
        ];

        DB::table('transport_types')->insert($transportTypes);
    }
}
