<?php

namespace App\Http\Controllers;

use App\Models\adminDrivers;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = Driver::all();
        return view('adminDrivers', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('agregarDriver');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $drivers = new adminDrivers();
        $drivers->rank_id = $request->post('rank_id');
        $drivers->identification_card = $request->post('identification_card');
        $drivers->names = $request->post('names');
        $drivers->last_names = $request->post('last_names');
        $drivers->phone = $request->post('phone');
        $drivers->blood_type  = $request->post('blood_type');
        $drivers->license_number = $request->post('license_number');
        // Obtener el archivo de la solicitud
        $file = $request->file('img_url');
        
        if ($file !== null) {
            if ($file->isValid()) {
                $imagenPath = $file->store('public/imagenes');
                $drivers->img = $imagenPath;
            } else {
                return response()->json(['error' => 'La carga del archivo no es válida'], 400);
            }
        } 

        $drivers->save();

        return redirect()->route('adminDrivers.index');
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
    public function edit(adminDrivers $adminDrivers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, adminDrivers $adminDrivers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(adminDrivers $adminDrivers)
    {
        //
    }
}
