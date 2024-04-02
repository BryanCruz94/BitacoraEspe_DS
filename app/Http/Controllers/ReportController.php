<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Novelty;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dato = new \stdClass();
        $dato->fechaInicio = '2021-01-01';
        $pdf = Pdf::loadView('reports.prueba', compact('dato'));
        return $pdf->download('invoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generateReportVehicles(Request $request)
    {
        $fechaInicio = $request->post('fechaInicio');
        $fechaFin = $request->post('fechaFin');
        $fechaHoy =  Carbon::now()->format('dMY-H:i');

        $vehicleLog = DB::table('view_vehicleslog')
        ->where('departure_time', '>=', $fechaInicio)
        ->where('departure_time', '<=', $fechaFin)
        ->get();


        $vehiclesOut = DB::table('view_vehiclesout')
        ->get();


        $pdf = Pdf::loadView('reports.reportVehicleLogs', compact('vehicleLog', 'vehiclesOut', 'fechaInicio', 'fechaFin'))->setPaper('a4', 'landscape');
        return $pdf->download('ReporteMovVehicular'.$fechaHoy.'.pdf');
    }

    public function generateReportNovelties(Request $request)
    {
        $fechaInicio = $request->post('fechaInicio');
        $fechaFin = $request->post('fechaFin');
        $fechaHoy =  Carbon::now()->format('dMY-H:i');

        $novelties = DB::table('view_novelties')
        ->orderBy('hour')
        ->get();


        $pdf = Pdf::loadView('reports.reporteNovedades', compact('novelties', 'fechaInicio', 'fechaFin'))->setPaper('a4', 'portrait');
        return $pdf->download('ReporteNovedades'.$fechaHoy.'.pdf');
    }

}
