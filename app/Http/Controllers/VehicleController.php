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
        return view ('adminVehicles', compact('datos'));
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
        $adminVehicles->description=$request->post('description');
        $adminVehicles->plate=$request->post('plate');
        $adminVehicles->in_university=$request->post('in_university');
        //$adminVehicles = Vehicle::create($request->all());

        $img = $request->file('img');
        $imgPath = $img ->store('public/img');
        $adminVehicles->img_url = $imgPath;
        $adminVehicles->save();
        //retornar
        return redirect()->route('adminVehicles.index') -> with('mensaje','El registro se agrego de forma exitosa');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
