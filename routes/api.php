<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Models\ServiceProduct;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/invoices', function () {
//     return ServiceProduct::all();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    //For User
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    //For Product
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);

    //For Invoice
    Route::get('/invoices', [InvoiceController::class, 'index']);
    // Route::get('/invoice/create', [InvoiceController::class, 'create']);
    Route::post('/invoices', [InvoiceController::class, 'createInvoice']);
    Route::get('/invoice/{id}', [InvoiceController::class, 'showInvoice']);
    // Route::get('/invoice/{id}/edit', [InvoiceController::class, 'editInvoice']);
    Route::put('/invoice/{id}', [InvoiceController::class, 'updateInvoice']);
    Route::delete('/invoice/{id}', [InvoiceController::class, 'destroyInvoice']);

});


// Route::get('/invoices', [InvoiceController::class, 'index']);
// Route::get('/invoice/create', [InvoiceController::class, 'create']);
// Route::post('/invoice', [InvoiceController::class, 'store']);
// Route::get('/invoice/{id}', [InvoiceController::class, 'show']);
// Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit']);
// Route::patch('/invoice/{id}', [InvoiceController::class, 'update']);
// Route::delete('/invoice/{id}', [ProductController::class, 'destroy']);
