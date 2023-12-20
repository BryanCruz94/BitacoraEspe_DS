<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Novelty;
use App\Models\Vehicle;
use App\Models\VehicleLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class VehicleLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleLog = DB::table('view_vehicleslog')->get();
        $vehiclesOut = DB::table('view_vehiclesout')->get();

        $vehicles = Vehicle::all();
        // $drivers = Driver::with(['rank' => fn ($query) => $query->orderBy('name')])->get() ;
        $drivers = Driver::with('rank')->orderBy('rank_id')->get();



        return view('vehicles', compact('vehicleLog', 'vehiclesOut', 'vehicles', 'drivers'));
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
        $vehicleLog = new VehicleLog();
        $novelty = new Novelty();
        $vehicle = Vehicle::find($request->post('plateOut'));
        $driver = Driver::find($request->Driver_id);

        $vehicleLog->Vehicle_id = $request->post('plateOut');
        $vehicleLog->departure_time = Carbon::now()->setTimezone('America/Guayaquil');
        $vehicleLog->departure_km = $request->departure_km;
        $vehicleLog->destination = $request->destination;
        $vehicleLog->mission = $request->mission;
        $vehicleLog->GuardsOut_id = auth()->user()->id;
        $vehicleLog->Driver_id = $request->Driver_id;

        $novelty->hour = Carbon::now()->setTimezone('America/Guayaquil');
        $noveltyString = 'Salida del vehículo ' . $vehicle->description . ' con placa '
            . $vehicle->plate . ' con destino a ' . $request->destination
            . ' con la misión de ' . $request->mission . ' con el conductor '
            . $driver->names . ' ' . $driver->last_names;
        $novelty->Guard_id = auth()->user()->id;
        $novelty->novelty = $noveltyString;


        if ($vehicle->in_university == 1) {
            $vehicle->in_university = 0;
            $vehicleLog->save();
            $vehicle->save();
            $novelty->save();
            return redirect()->route('vehiclesLog.index');
        } else {
            return redirect()->route('vehiclesLog.index')->with([
                'message' => 'El vehículo ya se encuentra fuera de la universidad.',
                'type'    => 'danger',
            ]);
        }
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
    public function update(Request $request)
    {
        $plateIn = $request->post('plateIn');
        $vehicle = Vehicle::find($request->post('plateIn'));
        $novelty = new Novelty();
        // Obtener el último registro de VehicleLog con el valor de Vehicle_id proporcionado
        $vehicleLog = VehicleLog::where('Vehicle_id', $plateIn)
            ->orderBy('entry_time', 'desc')
            ->first();
        $driver = Driver::find($vehicleLog->Driver_id);


        $vehicleLog->Vehicle_id = $request->post('plateIn');
        $vehicleLog->entry_time = Carbon::now()->setTimezone('America/Guayaquil');
        $vehicleLog->entry_km = $request->entry_km;
        $vehicleLog->observation = $request->observation;
        $vehicleLog->GuardsIn_id = auth()->user()->id;

        $novelty->hour = Carbon::now()->setTimezone('America/Guayaquil');
        $noveltyString = 'Ingreso del vehículo ' . $vehicle->description . ' con placa '
            . $vehicle->plate . ' desde ' . $vehicleLog->destination
            . ', se encontraba realizando: ' . $vehicleLog->mission . ' con el conductor '
            . $driver->names . ' ' . $driver->last_names;
        $novelty->Guard_id = auth()->user()->id;
        $novelty->novelty = $noveltyString;


        if ($vehicle->in_university == 0) {
            $vehicle->in_university = 1;
            $vehicleLog->save();
            $vehicle->save();
            $novelty->save();
            return redirect()->route('vehiclesLog.index');
        } else {
            return redirect()->route('vehiclesLog.index')->with([
                'message' => 'El vehículo se encuentra dentro de la universidad.',
                'type'    => 'danger',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
