<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\EstablishmentController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\PurchaseController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route:: prefix('categoria')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/cadastrar', [CategoryController::class, 'store']);
    Route::get('/consultar/{id}', [CategoryController::class, 'show']);
    Route::put('/editar/{id}', [CategoryController::class, 'update']);
    Route::delete('/deletar/{id}', [CategoryController::class, 'destroy']);
});

Route:: prefix('estabelecimento')->group(function () {
    Route::get('/', [EstablishmentController::class, 'index']);
    Route::post('/cadastrar', [EstablishmentController::class, 'store']);
    Route::get('/consultar/{id}', [EstablishmentController::class, 'show']);
    Route::put('/editar/{id}', [EstablishmentController::class, 'update']);
    Route::delete('/deletar/{id}', [EstablishmentController::class, 'destroy']);
});

Route:: prefix('produto')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/cadastrar', [ProductController::class, 'store']);
    Route::get('/consultar/{id}', [ProductController::class, 'show']);
    Route::put('/editar/{id}', [ProductController::class, 'update']);
    Route::delete('/deletar/{id}', [ProductController::class, 'destroy']);
});

Route:: prefix('registrocompra')->group(function () {
    Route::get('/', [PurchaseController::class, 'index']);
    Route::get('/getregistro', [PurchaseController::class, 'getRegistroCompra']);
    Route::get('/getregistroByUser/{idUser}', [PurchaseController::class, 'getRegistroCompraByUser']);
    Route::post('/cadastrar', [PurchaseController::class, 'store']);
    Route::get('/consultar/{id}', [PurchaseController::class, 'show']);
    Route::put('/editar/{id}', [PurchaseController::class, 'update']);
    Route::delete('/deletar/{id}', [PurchaseController::class, 'destroy']);
});

Route:: prefix('usuario')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/cadastrar', [UserController::class, 'store']);
    Route::get('/consultar/{id}', [UserController::class, 'show']);
    Route::put('/editar/{id}', [UserController::class, 'update']);
    Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
