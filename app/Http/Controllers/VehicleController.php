<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Vehicle::all();
        //dd($datos);
        return view('adminVehicles', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $adminVehicles = new Vehicle();
        $adminVehicles->description = $request->post('description');
        $adminVehicles->plate = $request->post('plate');
        $adminVehicles->in_university = $request->post('in_university');
        //$adminVehicles = Vehicle::create($request->all());

        $img = $request->file('img');
        $imgPath = $img->store('public/img');
        $adminVehicles->img_url = $imgPath;
        $adminVehicles->save();
        //retornar
        return redirect()->route('adminVehicles.index')->with('mensaje', 'El registro se agrego de forma exitosa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datosEditar = Vehicle::find($id);
        return view('adminVehicles', compact('datosEditar'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosActualizar = Vehicle::find($id);
        // Actualizar los atributos
        $datosActualizar->description = $request->description;
        $datosActualizar->plate = $request->plate;
        $datosActualizar->in_university = $request->in_university;
        if ($request->file('img') != null) {
            $img = $request->file('img');
            $imgPath = $img->store('public/img');
            $datosActualizar->img_url = $imgPath;
        }
        $datosActualizar->save();
        return redirect()->route('adminVehicles.index')->with('mensaje', 'El registro se actualizó de forma exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $vehicle = Vehicle::find($id);
    if (!$vehicle) {
        return redirect()->route('adminVehicles.index')->with('mensaje', 'Vehículo no encontrado');
    }
    $vehicle->delete();
    return redirect()->route('adminVehicles.index')->with('mensaje', 'Vehículo eliminado exitosamente');
}
}
