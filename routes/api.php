<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/customers' , [CustomerController::class , 'index']);
Route::get('/customers/{id}' , [CustomerController::class , 'show']);
Route::post('/addNewCustomer' , [CustomerController::class , 'addNew']);
Route::put('/updateCustomer/{id}' , [CustomerController::class , 'update']);
Route::delete('deleteCustomer/{id}' , [CustomerController::class , 'delete']);