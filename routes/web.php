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


Route::get('/vehicles', function () {
    return view('vehicles');
})->middleware('auth');

//********** */
Route::get('/adminVehicles', function () {
    return view('adminVehicles');
})->name("adminVehicles.index");

/*Route::get('/adminVehicles',[VehicleController::class,'index'])
-> name ('vehicle.index');*/

Route::post('/store',[VehicleController::class,'store'])
-> name ('vehicle.store');


//Route::resource('/adminVehicles', AdminVehiclesController::class);


/*Route::post('/edit/{id}', [AdminVehicles::class, 'edit'])
-> name ('adminVehicles.edit');*/

//******************** */

Route::get('/adminDrivers', function () {
    return view('adminDrivers');
})->name("adminDrivers.index");




Route::get('/reports', function () {
    return view('reports');
})->middleware('auth');






//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
