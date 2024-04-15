<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/update', [EstoqueController::class, 'update']);
Route::post('/creater', [EstoqueController::class, 'create']);
