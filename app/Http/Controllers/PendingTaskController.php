<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PendingTask;
use App\Models\Novelty;
use Carbon\Carbon;

class PendingTaskController extends Controller
{

    public function index()
    {
        //
        $penddings = DB::table('view_pedding_task')->get();

        $penddingsDone = DB::table('view_task_done')->get();

        return view('pendingTask.pendings', compact('penddings','penddingsDone'));

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
        $pennding = new PendingTask();

        $pennding->hour_create=Carbon::now()->setTimezone('America/Guayaquil');
        $pennding->pending_task=$request->newPendding;
        $pennding->task_done=0;
        $pennding->observations='';
        $pennding->userCreate_id=auth()->user()->id;

        $pennding->save();
        return redirect()->route('pendding.index');


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
    public function edit( $id)
    {
        //
        $pendding = PendingTask::find($id);

        return view('pendingTask.editPendings', compact('pendding'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //Se modifica la tabla pending Task
        $pendding = PendingTask::find($id);

        $pendding->task_done=1;
        $pendding->observations=$request->observations;
        $pendding->hour_done=Carbon::now()->setTimezone('America/Guayaquil');
        $pendding->userDone_id=auth()->user()->id;

        $pendding->save();

        // Se crea un String para guardar la novedad en la tabla Novelties
        $noveltie = new Novelty();
        $noveltie->hour=Carbon::now()->setTimezone('America/Guayaquil');
        $noveltie->novelty='Se ha realizado la consigna: '.$pendding->pending_task . '. Con la/las siguientes observaciones: '. $request->observations;
        $noveltie->Guard_id=auth()->user()->id;
        $noveltie->save();

        // Se redirecciona a la vista pendings
        return redirect()->route('pendding.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
