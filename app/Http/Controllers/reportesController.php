<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use DB;
use App\Models\Pedido;
use App\Models\Empleado;
use App\Models\DetallePedido;
use App\Exports\PedidosExport;
use Maatwebsite\Excel\Facades\Excel;

class reportesController extends Controller
{
    public function reportPDF($idEmpleado, $tipoReporte, $date1 = null, $date2 = null)
    {
        $data = [];
        //reportes del dia
        if ($tipoReporte == 0) {
            $date1 = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $date2 = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23.59.59';
        } else {
            $date1 = Carbon::parse($date1)->format('Y-m-d') . ' 00:00:00';
            $date2 = Carbon::parse($date2)->format('Y-m-d') . ' 00:00:00';
        }

        if ($idEmpleado == 0) {
            $data = DB::select('call spReportesAll(?,?)', array($date1, $date2));
        } else {
            $data = DB::select('call spReporteByEmpleado(?,?,?)', array($idEmpleado, $date1, $date2));
        }

        $empleado = $idEmpleado == 0 ? 'Todos' : Empleado::join('ciudadano as c', 'c.dni', 'empleado.dni')
            ->select('c.nombre', 'c.aPaterno', 'c.aMaterno', 'empleado.emailCorporativo', 'empleado.dni', 'c.direccion', 'empleado.telefono')
            ->where('empleado.idEmpleado', $idEmpleado)
            ->get();
        $pdf = PDF::loadView('Reportes.pdfReporte', compact('data', 'tipoReporte', 'empleado', 'date1', 'date2'));
        return $pdf->stream('pedidosReportes,pdf');
        //descargar
        // return $pdf->download('pedidosReportes,pdf'); 
    }

    public function reportEXCEL($idEmpleado, $tipoReporte, $date1 = null, $date2 = null)
    {
        // return Excel::download(new PedidosExport, 'pedido.xlsx');
        $data = [];
        //reportes del dia
        if ($tipoReporte == 0) {
            $date1 = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $date2 = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23.59.59';
        } else {
            $date1 = Carbon::parse($date1)->format('Y-m-d') . ' 00:00:00';
            $date2 = Carbon::parse($date2)->format('Y-m-d') . ' 00:00:00';
        }

        if ($idEmpleado == 0) {
            $data = DB::select('call spReportesAll(?,?)', array($date1, $date2));
        } else {
            $data = DB::select('call spReporteByEmpleado(?,?,?)', array($idEmpleado, $date1, $date2));
        }

        // $empleado = $idEmpleado == 0 ? 'Todos' : Empleado::join('ciudadano as c', 'c.dni', 'empleado.dni')
        //     ->select('c.nombre', 'c.aPaterno', 'c.aMaterno', 'empleado.emailCorporativo', 'empleado.dni', 'c.direccion', 'empleado.telefono')
        //     ->where('empleado.idEmpleado', $idEmpleado)
        //     ->get();
        $export = new PedidosExport($data);

        return Excel::download($export, 'pedidos.xlsx');
    }
}
