<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Carbon\Carbon;
use DB;

class reportesController extends Component
{

    public $data, $empleado, $tipoReporte, $empleados, $date1, $date2,
        $details, $sumDetails, $countDetails, $orderId;

    public function render()
    {
        DB::table('empleado as e')->join('ciudadano as c', 'e.dni', '=', 'c.dni')
            ->select('e.idEmpleado', 'c.nombre', 'c.aPaterno', 'c.aMaterno')->orderBy('c.nombre', 'asc')->get();
        return view('livewire.Reportes.index')
            ->extends('layouts.app')
            ->section('content');;
    }

    public function mount()
    {
        $this->data = [];
        $this->details = [];
        $this->sumDetails = 0;
        $this->countDetails = 0;
        $this->tipoReporte = 0;
        $this->empleado = 0;
    }

    public function OrderByDate()
    {
        //Ventas del dis
        if ($this->tipoReporte == 0) {
            $date1 = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $date2 = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23.59.59';
        } else {
            $date1 = Carbon::parse($this->date1)->format('Y-m-d') . ' 00:00:00';
            $date2 = Carbon::parse($this->date2)->format('Y-m-d') . ' 00:00:00';
        }

        if ($this->tipoReporte == 1 && ($this->date1 == '' || $this->date2 == '')) {
            return;
        }

        if ($this->empleado == 0) {
            $this->data=DB::table('pedido as p')
            ->join('empleado as e','p.idEmpleado','=','e.idEmpleado')
            ->join('ciudadano as c','e.dni', '=', 'c.dni')
            ->join('detallePedido as dp', 'p.idPedido','=', 'dp.idPedido')
            ->select('pedido.*','c.nombre','c.aPaterno','c.aMaterno');
            ->groupBy('dp.idPedido')
        }
    }
}
