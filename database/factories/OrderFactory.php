<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'from_location' => $this->faker->city,
            'to_location' => $this->faker->city,
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'type_of_transport' => $this->faker->word,
            'type_of_cargo' => $this->faker->word,
            'status' => 'Новый',
            'phone' => $this->faker->phoneNumber,
            'price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}


