<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PendingTask;
use Carbon\Carbon;

class PendingTaskController extends Controller
{
    
    public function index()
    {
        //
        $penddings = DB::table('view_pedding_task')->get();
        
        $penddingsDone = DB::table('view_task_done')->get();

        return view('pendings', compact('penddings','penddingsDone'));

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
        $pennding->userCreate_id=2;

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
