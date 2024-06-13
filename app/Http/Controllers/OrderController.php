<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(Request $request){
        $credentials = $request->all();
        Order::create([
            'from_location' => $credentials['fromLocation'],
            'to_location' => $credentials['toLocation'],
            'date' => $credentials['date'],
            'time' => $credentials['time'],
            'type_of_transport' => $credentials['typeOfTransport'],
            'type_of_cargo' => $credentials['typeOfCargo'],
            'status' => $credentials['status'],
            'phone' => $credentials['phone'],
            'price' => $credentials['price'],
        ]);
        return response()->json([
            'message' => 'Успешно оформлено. Ожидайте',
        ], 201);
    }
    public function show(){
        $orders = Order::all();
        return response()->json([
            'orders' => $orders,
        ], 201);

    }
    public function destroy($id){
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            $maxId = Order::max('id') + 1;
            DB::statement("ALTER TABLE orders AUTO_INCREMENT = $maxId");
            return response()->json([
                'message' => 'Успешно удален'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete order',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function updateStatus(Request $request, $id)
{
    try {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return response()->json([
            'message' => 'Статус успешно обновлен'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to update status',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
