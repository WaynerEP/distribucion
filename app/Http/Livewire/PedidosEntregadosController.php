<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class PedidosEntregadosController extends Component
{

    public $dni;

    public function render()
    {
        $data = DB::select('call getPedidosParaEntregar(?)', array($this->dni));
        return view('livewire.Entregados.PedidosEntregados', ['data' => $data])
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount()
    {
        $this->dni = Auth()->user()->dniCiudadano;
    }
}
