<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'from_location' => 'Ногинск',
                'to_location' => 'Москва',
                'date' => '2024-06-15',
                'time' => '15:30:00',
                'type_of_transport' => 'Газель',
                'type_of_cargo' => 'Жидкий',
                'status' => 'Новый',
                'phone' => '+7 (918)-392-33-28',
                'price' => 15000.00,
            ],
            [
                'from_location' => 'Санкт-Петербург',
                'to_location' => 'Москва',
                'date' => '2024-06-16',
                'time' => '12:00:00',
                'type_of_transport' => 'Камаз',
                'type_of_cargo' => 'Сыпучий',
                'status' => 'В процессе',
                'phone' => '+7 (916)-123-45-67',
                'price' => 20000.00,
            ],
            [
                'from_location' => 'Казань',
                'to_location' => 'Уфа',
                'date' => '2024-06-17',
                'time' => '09:30:00',
                'type_of_transport' => 'Фура',
                'type_of_cargo' => 'Контейнерный',
                'status' => 'Завершен',
                'phone' => '+7 (917)-765-43-21',
                'price' => 30000.00,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
