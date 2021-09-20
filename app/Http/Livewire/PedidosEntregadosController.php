<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\EntregaDistribucion;
use DB;

class PedidosEntregadosController extends Component
{

    use WithFileUploads;

    public $dni, $idPedido, $idDistribucion, $idRepartidor, $image, $nota, $monto;

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


    public function openModal($id, $dist, $idRe)
    {
        $this->idPedido = $id;
        $this->idDistribucion = $dist;
        $this->idRepartidor = $idRe;
        $this->emit('show-modal', 'show-modal!');
    }

    public function store()
    {
        $this->validate(
            [
                'image' => 'required',
                'nota' => 'required',
                'monto' => 'required',
            ],
            [
                'image.required' => 'Seleccione una imagen de la entrega del pedido',
                'nota.required' => 'Ingrese una nota de entrega',
                'monto.required' => 'Ingrese monto  de pago',
            ]
        );

        $customFileName = uniqid() . '_.' . $this->image->extension();
        $this->image->storeAs('public/entregas', $customFileName);

        $entrega = EntregaDistribucion::create([
            'idDistribucion' => $this->idDistribucion,
            'idPedido' => $this->idPedido,
            'idRepartidor' => $this->idRepartidor,
            'monto' => $this->monto,
            'nota' => $this->nota,
            'image' => $customFileName,
        ]);

        $this->resetUI();
        $this->emit('product-updated', 'Pedido Actualizado!');
    }


    public function resetUI()
    {
        $this->reset('idPedido', 'idDistribucion', 'idRepartidor', 'image', 'nota', 'monto');
    }
}
