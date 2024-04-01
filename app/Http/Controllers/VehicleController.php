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
        $datos = Vehicle::orderByDesc('is_active')->orderBy('plate')->where('is_active',true) ->get();

        $nombreGuarda = auth()->user()->name;

        return view('adminVehicles.adminVehicles', compact('datos', 'nombreGuarda'));
    }


    public function store(Request $request)
    {

        $adminVehicles = new Vehicle();
        $adminVehicles->description = $request->post('description');
        $adminVehicles->plate = $request->post('plate');
        $adminVehicles->in_university = $request->has('in_university');
        $img = $request->file('img');
        $imgPath = $img->store('public/img');
        $adminVehicles->img_url = $imgPath;
        $adminVehicles->is_active = true;
        $adminVehicles->save();
        //retornar
        return redirect()->route('vehicle.index')->with('mensaje', 'El registro se agrego de forma exitosa');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $vehicle = Vehicle::find($id);
        return view('adminVehicles.updateVehicles', compact('vehicle'));
    }



    public function update(Request $request, $id)
    {
        $adminVehicles = Vehicle::find($id);
        $adminVehicles->description = $request->post('description');
        $adminVehicles->plate = $request->post('plate');
        $adminVehicles->in_university = $request->has('in_university');
        $img = $request->file('img');
        $imgPath = $img->store('public/img');
        $adminVehicles->img_url = $imgPath;
        $adminVehicles->updated_at = now();
        $adminVehicles->save();
        return redirect()->route('vehicle.index')->with('mensaje', 'El registro se registró de forma exitosa');
    }

    public function delete($id)
    {
        $datos = Vehicle::find($id);
        return view('adminVehicles.deleteVehicles', compact('datos'));
    }
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->is_active = false;
        $vehicle->updated_at = now();
        $vehicle->save();
        return redirect()->route('vehicle.index')->with('mensaje', 'Vehículo eliminado exitosamente');
    }


}
