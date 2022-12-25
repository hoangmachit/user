<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => [
        'auth'
    ],
    'prefix' => 'admin',
    'as' => 'admin.',
    'name' => 'admin.'
], function () {
    Route::resource('/domain', DomainController::class);
    Route::resource('/design', DesignController::class);
    Route::resource('/contract', ContractController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/hosting', HostingController::class);
    Route::group([
        'prefix' => 'setting',
        'as'    => 'setting.',
        'name'  => 'admin.'
    ], function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
    });
});
