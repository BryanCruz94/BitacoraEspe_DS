<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Novelty;
use Carbon\Carbon;

class NoveltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //RETORNAR UNA TABLA DESDE UNA VISTA CON LAS NOVEDADES
        $novelties = DB::table('view_novelties')->get();
        return view('binnacle', compact('novelties'));
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
        $noveltie = new Novelty();

        $noveltie -> hour = Carbon::now()->setTimezone('America/Guayaquil');
        $noveltie -> novelty = $request -> novelty;
        $noveltie -> Guard_id = 1;

        $noveltie -> save();
        return redirect()->route('binnacle.index');

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
