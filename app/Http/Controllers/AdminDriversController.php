<?php

namespace App\Http\Controllers;

use App\Models\adminDrivers;
use App\Models\Driver;
use App\Models\Rank;
use Illuminate\Http\Request;


class AdminDriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = Driver::all();

        return view('adminDrivers.adminDrivers', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adminDrivers.agregarDriver');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $drivers = new Driver();
        $drivers->rank_id = $request->post('rank_id');
        $drivers->identification_card = $request->post('identification_card');
        $drivers->names = $request->post('names');
        $drivers->last_names = $request->post('last_names');
        $drivers->phone = $request->post('phone');
        $drivers->blood_type  = $request->post('blood_type');
        $drivers->license_type = $request->post('license_type');
        // Obtener el archivo de la solicitud
        $file = $request->file('img');

        if ($file !== null) {
            if ($file->isValid()) {
                $imagenPath = $file->store('public/imagenes');
                $drivers->img = $imagenPath;
            } else {
                return response()->json(['error' => 'La carga del archivo no es válida'], 400);
            }
        }

        $drivers->save();

        return redirect()->route('drivers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(adminDrivers $adminDrivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $drivers = Driver::find($id);
        $ranks = Rank::all();
        return view('adminDrivers.actualizarDriver', compact('drivers','ranks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
          //
          $drivers = Driver::find($id);
          $drivers->identification_card = $request->post('identification_card');
          $drivers->names = $request->post('names');
          $drivers->last_names = $request->post('last_names');
          $drivers->phone = $request->post('phone');
          $drivers->blood_type  = $request->post('blood_type');
          $drivers->license_type = $request->post('license_type');
          // Obtener el archivo de la solicitud
          $file = $request->file('img');

          if ($file !== null) {
              if ($file->isValid()) {
                  $imagenPath = $file->store('public/imagenes');
                  $drivers->img = $imagenPath;
              } else {
                  return response()->json(['error' => 'La carga del archivo no es válida'], 400);
              }
          }

          $drivers->save();

          return redirect()->route('drivers.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $drivers = Driver::find($id);
        return view('eliminar', compact('$drivers'));
    }
    public function destroy($id)
    {
        $drivers = Driver::find($id);
        $drivers->delete();
        echo "Eliminado con éxito";

        return redirect()->route("drivers.index");
    }
}
