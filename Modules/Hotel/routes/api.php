<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Modules\Hotel\Http\Controllers\Frontend\HotelsController;

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

Route::middleware('auth:api')->get('/hotels', function (Request $request) {
    return $request->user();
});

Route::get('fetch-data', [HotelsController::class, 'fetchData']);
