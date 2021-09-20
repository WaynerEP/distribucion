<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DetalleListaPedido;
use DB;

class UpdateStateController extends Component
{

    public $data, $estado, $dni, $tipoestado;


    public function render()
    {
        $this->getPedidosByEmpleado();
        return view('livewire.UpdatePedido.estado')
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount()
    {
        $this->data = [];
        $this->estado = 'PENDIENTE';
        $this->tipoestado = 1;
        $this->dni = Auth()->user()->dniCiudadano;
    }

    public function getPedidosByEmpleado()
    {
        if ($this->estado) {
            $this->data = DB::select('call sp_cambiarEstadoPedido(?,?)', array($this->dni, $this->estado));
        }
    }

    public function changePedidosByEstado($state, $n)
    {
        $this->estado = $state;
        $this->tipoestado = $n;
    }

    public function changeStatePedido($id)
    {
        if ($this->tipoestado == 1) {
            $pedido = DetalleListaPedido::find($id);
            $pedido->Update([
                'estado' => 'TOMADA',
            ]);
            return;
        }
        if ($this->tipoestado == 2) {
            $pedido = DetalleListaPedido::find($id);
            $pedido->Update([
                'estado' => 'LISTA',
            ]);
            return;
        }
    }
}
