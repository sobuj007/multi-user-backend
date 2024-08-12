<?php
namespace App\Http\Controllers;
// app/Http/Controllers/OrderController.php
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Store a new order
    public function storeOrder(Request $request)
    {
        $order = new Order();
        $order->name = $request->input('name');
        $order->img = $request->input('img');
        $order->selectedTime = $request->input('selectedTime');
        $order->selectedDate = $request->input('selectedDate');
        $order->selectedServicsQun = $request->input('selectedServicsQun');
        $order->selectedProductQun = $request->input('selectedProductQun');
        $order->orderfor = $request->input('orderfor');
        $order->orderby = $request->input('orderby');
        $order->product = json_encode($request->input('product')); // Store product details as JSON
        $order->orderstatus = $request->input('orderstatus');

        $order->save();

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order
        ]);
    }

    // Get all orders
    public function getAllOrders()
    {
        $orders = Order::all();

        return response()->json([
            'message' => 'Successfully retrieved all orders',
            'data' => $orders
        ]);
    }

    // Get orders by user ID
    public function getOrdersByUser($userId)
    {
        $orders = Order::where('orderby', $userId)->get();

        return response()->json([
            'message' => 'Successfully retrieved orders for user',
            'data' => $orders
        ]);
    }

    // Receive orders by agent ID
    public function getOrdersByAgent($agentId)
    {
        $orders = Order::whereHas('product', function($query) use ($agentId) {
            $query->where('agent_id', $agentId);
        })->get();

        return response()->json([
            'message' => 'Successfully retrieved orders for agent',
            'data' => $orders
        ]);
    }
}
