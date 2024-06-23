<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_order()
    {
        $data = [
            'fromLocation' => 'Location A',
            'toLocation' => 'Location B',
            'date' => '2023-06-20',
            'time' => '10:00',
            'typeOfTransport' => 'Truck',
            'typeOfCargo' => 'Electronics',
            'status' => 'Новый',
            'phone' => '1234567890',
            'price' => '100.00',
        ];

        $response = $this->postJson('/api/order/create', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Успешно оформлено. Ожидайте',
                 ]);

        $this->assertDatabaseHas('orders', [
            'from_location' => 'Location A',
            'to_location' => 'Location B',
        ]);
    }


}
