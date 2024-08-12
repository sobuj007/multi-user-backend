<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetAllInfoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// routes/api.php

// Route to get services by agent_id
Route::get('/getallProductbyID', [ServiceProductController::class, 'getproductbyId']);

Route::middleware('auth:sanctum')->get('user', [UserController::class, 'show']);


Route::get('/getallProducts', [ServiceProductController::class, 'getallProduct']);
Route::post('/orders', [OrderController::class, 'storeOrder']); // Store a new order
Route::get('/orders', [OrderController::class, 'getAllOrders']); // Get all orders
Route::get('/orders/user/{userId}', [OrderController::class, 'getOrdersByUser']); // Get orders by user ID
Route::get('/orders/agent/{agentId}', [OrderController::class, 'getOrdersByAgent']); // Receive orders by agent ID

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//  apis
Route::get('/all-info', [GetAllInfoController::class, 'getAllInfo']);
