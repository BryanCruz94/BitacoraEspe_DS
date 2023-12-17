<?php

use App\Http\Controllers\AdminVehiclesController;
use App\Http\Controllers\NoveltyController;
use App\Http\Controllers\PendingTaskController;
use App\Http\Controllers\VehicleController;
use App\Models\AdminVehicles;
//use App\Models\Novelty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Route::get('prueba', function () {
    return DB::select("select * from view_novelties;");

});

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/index1', function () {
    return view('welcome');
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

//Route::resource('admin/vehicles', VehicleController::class)->names('vehicles'); //RECURSO DE L
Route::post('/store',[VehicleController::class,'store'])
-> name ('vehicle.store');

Route::get('/adminVehicles', function () {
    return view('adminVehicles');
})->name("adminVehicles.index");

/*Route::get('/adminVehicles',[VehicleController::class,'index'])
-> name ('vehicle.index');*/

Route::post('/edit/{id}', [VehicleController::class, 'edit'])->middleware('auth')
-> name ('adminVehicles.edit');
//update para actualizar el relajo ese
/*Route::post('/update/{id}', [VehicleController::class, 'update'])->middleware('auth')
->name('adminVehicles.update');*/
Route::post('adminVehicles/{id}', 'VehicleController@update')->name('adminVehicles.update');

Route::delete('/destroy/{id}', [VehicleController::class, 'destroy'])->middleware('auth')->name('adminVehicles.destroy');

//Route::post('adminVehicles/{id}', 'TuControlador@update')->name('adminVehicles.update');
//Route::resource('/adminVehicles', AdminVehiclesController::class);




//******************************************************************* */

Route::get('/adminDrivers', function () {
    return view('adminDrivers');
})->name("adminDrivers.index");




Route::get('/reports', function () {
    return view('reports');
})->middleware('auth');






//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
