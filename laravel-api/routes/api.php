<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\InvoiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// api/v1/customers
// api/v1/invoices

// api/v1
Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1','middleware'=>'auth:sanctum'],function() {
    Route::apiResource('customers',CustomerController::class);
    Route::apiResource('invoices',InvoiceController::class);

    Route::post('invoices/bulk',['uses'=>'InvoiceController@bulkStore']);
});
