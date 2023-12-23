<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductController;
use App\http\Controllers\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post("AddProduct" ,[ProductController::class ,'AddProduct']);
Route::post("AddCategory" ,[ProductController::class ,'AddCategory']);
Route::get("GetCategory" , [ProductController::class ,'GetCategory']);




Route::middleware('auth:sanctum')->get("GetProduct" ,[ProductController::class ,'GetProduct']);

Route::post("Register" ,[LoginController::class ,'Register']);
Route::post("Login" ,[LoginController::class ,'Login']);
Route::middleware('auth:sanctum')->get("refresh" ,[LoginController::class ,'refresh']);

//Route::middleware(['auth:sanctum' ,'Admin'])->get('users' ,[LoginController::class ,'users']) ;

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::middleware(['Admin'])->get('users' ,[LoginController::class ,'users']) ;

    });




    

    Route::post("Addorder" , [ProductController::class ,'AddOrder']);
    Route::post("AddorderProduct" , [ProductController::class ,'AddOrderProduct']);
    Route::get("GetOrderProduct" , [ProductController::class ,'GetOrderProduct']);
    Route::get("getOrderDetails" , [ProductController::class ,'getOrderDetails']);
