<?php

namespace App\Http\Controllers;

use App\Models\AdminVehicles;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$datos = Vehicle::all();
        return view ('adminVehicles', compact('datos'));*/
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
        //print_r('$_POST'); --no imprimio el relajo
        /*$adminVeh = new AdminVehicles();
        $adminVeh->plate=$request->post('plate'); //debe ser el mismo nombre del formulario agregar ->nombre
        $adminVeh->description=$request->post('description');
        $adminVeh->in_university=$request->post('in_university');
        $img = $request->file('img_url');
        $imgPath = $img ->store('public/img');
        $adminVeh->foto = $imgPath;
        $adminVeh->save();
        //retornar
        return redirect()->route('adminVehicles.index') -> with('mensaje','El registro se agrego de forma exitosa');*/
        $adminVehicles = AdminVehicles::create($request->all());

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
    public function show(AdminVehicles $adminVehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        /*$datosEditar= AdminVehicles::find($id);
        return view ('layouts.actualizar', compact('datosEditar'));*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminVehicles $adminVehicles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminVehicles $adminVehicles)
    {
        //
    }
}
