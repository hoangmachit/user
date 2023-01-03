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
    return view('index');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => [
        'auth'
    ],
    'prefix' => 'admin',
    'as' => 'admin.',
    'name' => 'admin.'
], function () {
    Route::group([
        'prefix' => 'domain',
        'as'    => 'domain.',
        'name'  => 'domain.'
    ], function () {
        Route::get('/all', [DomainController::class, 'all'])->name('all');
    });
    Route::resource('/domain', DomainController::class);
    Route::resource('/design', DesignController::class);
    Route::group([
        'prefix' => 'contract',
        'as'    => 'contract.',
        'name'  => 'contract.'
    ], function () {
        Route::get('/list', [ContractController::class, 'list'])->name('list');
        Route::get('/data-all', [ContractController::class, 'data_all'])->name('data_all');
        Route::get('/detail-domain', [ContractController::class, 'detail_domain'])->name('detail_domain');
        Route::get('/detail-package', [ContractController::class, 'detail_package'])->name('detail_package');
        Route::delete('/delete-domain', [ContractController::class, 'delete_domain'])->name('delete_domain');
        Route::delete('/delete-package', [ContractController::class, 'delete_package'])->name('delete_package');
        Route::post('/save-domain', [ContractController::class, 'save_domain'])->name('save_domain');
        Route::post('/save-package', [ContractController::class, 'save_package'])->name('save_package');
    });
    Route::resource('/contract', ContractController::class);
    Route::resource('/customer', CustomerController::class);
    Route::group([
        'prefix' => 'setting',
        'as'    => 'setting.',
        'name'  => 'admin.'
    ], function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/', [SettingController::class, 'change_password'])->name('change_password');
    });
});
