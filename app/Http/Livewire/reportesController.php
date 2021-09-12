<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DetallePedido;

use Carbon\Carbon;
use DB;

class reportesController extends Component
{

    public $data, $idempleado, $tipoReporte, $date1, $date2,
        $details, $sumDetails, $countDetails, $orderId;

    public function render()
    {
        $this->OrderByDate();
        $empleados = DB::table('empleado as e')
            ->join('ciudadano as c', 'e.dni', '=', 'c.dni')
            ->select('e.idEmpleado', 'c.nombre', 'c.aPaterno', 'c.aMaterno')
            ->orderBy('c.nombre', 'asc')
            ->get();
        return view('livewire.Reportes.index', ['empleados' => $empleados])
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount()
    {
        $this->data = [];
        $this->details = [];
        $this->sumDetails = 0;
        $this->countDetails = 0;
        $this->tipoReporte = 0;
        $this->idempleado = 0;
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

        if ($this->tipoReporte && ($this->date1 == '' || $this->date2 == '')) {
            $this->data = [];
            return;
        }

        if ($this->idempleado == 0) {
            $this->data = DB::select('call spReportes(?,?)', array($date1, $date2));
        } else {
            $this->data = DB::select('call spReporteByEmpleado(?,?,?)', array($this->idempleado, $date1, $date2));
        }
    }

    public function getDetails($id)
    {
        $this->details = DetallePedido::join('producto as p', 'p.idProducto', 'detallePedido.idProducto')
            ->select('detallePedido.idPedido', 'p.nombre', 'p.precio','p.image', 'detallePedido.cantidadPedida','detallePedido.descuento')
            ->where('detallePedido.idPedido', $id)
            ->get();

        $suma = $this->details->sum(function ($item) {
            return $item->precio * $item->cantidadPedida;
        });

        $this->sumDetails = $suma;
        $this->countDetails = $this->details->sum('cantidadPedida');
        $this->orderId = $id;

        $this->emit('show-modal', 'Loadind data');
    }
}
