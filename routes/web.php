<?php

use App\Http\Controllers\AdminDriversController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\NoveltyController;
use App\Http\Controllers\PendingTaskController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleLogController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/index1', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');

// Ruta para abrir la vista admin.blade.php
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');

// Ruta para abrir la vista REPORTES
Route::get('/reports', function () {
    return view('reports.indexReports');
})->middleware('auth');



// ****** BITÁCORA NOVEDADES ******
//RUTA PARA MOSTRAR NOVEDADES
Route::get('/binnacle', [NoveltyController::class,'index'])->middleware('auth')->name("binnacle.index");
//CREAR NUEVA NOVEDAD
Route::post('/binnacle/newBinnacle', [NoveltyController::class,'store'])->middleware('auth')->name("binacle.store");

// ****** BITÁCORA CONSIGNAS ******
Route::get('/pendings', [PendingTaskController::class,'index'])->middleware('auth')->name("pendding.index");
Route::post('/pendings/newPending', [PendingTaskController::class,'store'])->middleware('auth')->name("pendding.store");
Route::post('/pendings/edit/{id}', [PendingTaskController::class, 'edit'])->middleware('auth')-> name ('pendings.editDone');
Route::post('/pendings/update/{id}', [PendingTaskController::class, 'update'])->middleware('auth')->name('pendings.update');


// ****** BITÁCORA VEHÍCULOS ******
Route::get('/vehicles', [VehicleLogController::class,'index'])->middleware('auth')->name("vehiclesLog.index");
Route::post('/vehicles/newVehicleLog', [VehicleLogController::class,'store'])->middleware('auth')->name("vehiclesLog.store");
Route::post('/vehicles/updateVehicleLog', [VehicleLogController::class,'update'])->middleware('auth')->name("vehiclesLog.update");



//******************************************************************* */
// ****************** AQUI EMPIEZA ADMIN VEHICULOS ******************
Route::get('/adminVehicles',[VehicleController::class,'index'])->middleware('auth')-> name ('vehicle.index');

Route::post('/store',[VehicleController::class,'store'])->middleware('auth')-> name ('vehicle.store');
Route::post('/adminVehicles/edit/{id}', [VehicleController::class, 'edit'])->middleware('auth')-> name ('adminVehicles.edit');
Route::post('/adminVehicles/update/{id}', [VehicleController::class, 'update'])->middleware('auth')->name('adminVehicles.update');
Route::post('/adminVehicles/delete/{id}', [VehicleController::class, 'delete'])->middleware('auth')->name('adminVehicles.delete');
Route::post('/adminVehicles/destroy/{id}', [VehicleController::class, 'destroy'])->middleware('auth')->name('adminVehicles.destroy');

// ****** AQUI TERMINA ADMIN VEHICULOS ******
//*********************** */




//*********************** */
// ****** AQUI EMPIEZA ADMIN DRIVERS ******
Route::get('/adminDrivers',[AdminDriversController::class,'index'])->middleware('auth')->name ('drivers.index');
Route::get('/createDrivers',[AdminDriversController::class,'create'])->middleware('auth')-> name ('drivers.create');
Route::post('/storeDrivers',[AdminDriversController::class,'store'])->middleware('auth')-> name ('drivers.store');
Route::post('/updateDrivers/{id}',[AdminDriversController::class,'update'])->middleware('auth')-> name ('drivers.update');
Route::post('/editDrivers/{id}',[AdminDriversController::class,'edit'])->middleware('auth')-> name ('drivers.edit');
Route::post('/deleteDrivers/{id}',[AdminDriversController::class,'delete'])->middleware('auth')-> name ('drivers.delete');
Route::post('/destroyDrivers/{id}',[AdminDriversController::class,'destroy'])->middleware('auth')-> name ('drivers.destroy');

// ****** AQUI TERMINA ADMIN DRIVERS ******
//*********************** */

//*********************** */
// ****** AQUI EMPIEZA ADMIN USERS ******
Route::get('/adminUsers',[AdminUserController::class,'index'])->middleware('auth')-> name ('user.index');
Route::post('/storeUsers',[AdminUserController::class,'store'])->middleware('auth')-> name ('user.store');
Route::post('/adminUsers/edit/{id}', [AdminUserController::class, 'edit'])->middleware('auth')-> name ('user.edit');
Route::post('/adminUsers/update/{id}', [AdminUserController::class, 'update'])->middleware('auth')->name('user.update');
Route::post('/adminUsers/delete/{id}', [AdminUserController::class, 'delete'])->middleware('auth')->name('user.delete');
Route::post('/adminUsers/destroy/{id}', [AdminUserController::class, 'destroy'])->middleware('auth')->name('user.destroy');

// ****** AQUI TERMINA ADMIN USERS ******
//*********************** */


//*********************** */
// ****** AQUI EMPIEZA REPORTES *********


// ****** AQUI TERMINA REPORTES ******

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
