<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'login' => $this->faker->unique()->userName,
            'password' => Hash::make('password'), // Пароль по умолчанию
            'role' => 'user',
        ];
    }
}
