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
    Route::group([
        'prefix' => 'domain',
        'as'    => 'domain.',
        'name'  => 'domain.'
    ], function () {
        Route::get('/all', [DomainController::class, 'all'])->name('all');
    });
    Route::resource('/domain', DomainController::class);
    Route::resource('/design', DesignController::class);
    Route::resource('/contract', ContractController::class);
    Route::group([
        'prefix' => 'contract',
        'as'    => 'contract.',
        'name'  => 'contract.'
    ], function () {
        Route::get('/{customer}/customer', [ContractController::class, 'customer'])->name('customer');
        Route::group([
            'prefix' => 'save',
            'as'    => 'save.',
            'name'  => 'save.'
        ], function () {
            Route::post('/domain', [ContractController::class, 'save_domain'])->name('domain');
            Route::post('/package', [ContractController::class, 'save_package'])->name('package');
        });
        Route::group([
            'prefix' => 'delete',
            'as'    => 'delete.',
            'name'  => 'delete.'
        ], function () {
            Route::delete('/domain', [ContractController::class, 'delete_domain'])->name('domain');
            Route::post('/package', [ContractController::class, 'delete_package'])->name('package');
        });
        Route::get('/list/domain', [ContractController::class, 'list_domain'])->name('list_domain');
        Route::get('/list/package', [ContractController::class, 'list_package'])->name('list_package');
        Route::get('/{domain}/domain', [ContractController::class, 'domain'])->name('domain');
        Route::get('/{package}/package', [ContractController::class, 'package'])->name('package');
        Route::get('/{design}/design', [ContractController::class, 'design'])->name('design');
    });
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
