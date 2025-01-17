<?php

use App\Http\Controllers\PaiementRedirect;
use App\Services\SchoolsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/payer', [PaiementRedirect::class, 'index']);
Route::Post('/payer', [PaiementRedirect::class, 'index']);

Route::Post('/Paiements', [SchoolsServices::class, 'index']);