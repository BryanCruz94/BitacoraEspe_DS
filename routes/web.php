<?php

use App\Http\Controllers\AdminVehiclesController;
use App\Http\Controllers\NoveltyController;
use App\Http\Controllers\PendingTaskController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('prueba', function () {
    return DB::select("select * from view_novelties;");

});

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/index1', function () {
    return view('welcome');
})->middleware('auth');

// Ruta para abrir la vista admin.blade.php
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');




// ****************** BITÁCORA NOVEDADES ******************
//RUTA PARA MOSTRAR NOVEDADES
Route::get('/binnacle', [NoveltyController::class,'index'])->middleware('auth')->name("binnacle.index");
//CREAR NUEVA NOVEDAD
Route::post('/binnacle/newBinnacle', [NoveltyController::class,'store'])->middleware('auth')->name("binacle.store");

// ****************** BITÁCORA CONSIGNAS ******************
//RUTA PARA MOSTRAR CONSIGNAS PENDIENTES
Route::get('/pendings', [PendingTaskController::class,'index'])->middleware('auth')->name("pendding.index");
//CREAR NUEVA CONSIGNA
Route::post('/pendings/newPending', [PendingTaskController::class,'store'])->middleware('auth')->name("pendding.store");

// ****************** BITÁCORA VEHÍCULOS ******************
Route::get('/vehicles', function () {
    return view('vehicles');
})->middleware('auth');



//******************************************************************* */
// ****************** AQUI EMPIEZA ADMIN VEHICULOS ******************
Route::get('/adminVehicles',[VehicleController::class,'index'])-> name ('vehicle.index');

Route::post('/store',[VehicleController::class,'store'])-> name ('vehicle.store');

Route::post('/adminVehicles/edit/{id}', [VehicleController::class, 'edit'])->middleware('auth')-> name ('adminVehicles.edit');
Route::post('/adminVehicles/update/{id}', [VehicleController::class, 'update'])->middleware('auth')->name('adminVehicles.update');
Route::post('/adminVehicles/delete/{id}', [VehicleController::class, 'delete'])->middleware('auth')->name('adminVehicles.delete');
Route::post('/adminVehicles/destroy/{id}', [VehicleController::class, 'destroy'])->middleware('auth')->name('adminVehicles.destroy');


// ****************** AQUI TERMINA ADMIN VEHICULOS ******************
//******************************************************************* */


//******************************************************************* */
// ****************** AQUI EMPIEZA ADMIN DRIVERS ******************
Route::get('/adminDrivers', function () {
    return view('adminDrivers');})->name("adminDrivers.index");



// ****************** AQUI TERMINA ADMIN DRIVERS ******************
//******************************************************************* */




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
