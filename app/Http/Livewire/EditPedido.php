<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use DB;

class EditPedido extends Component
{

    public $nombre, $email, $direccion, $dni, $idPedido, $nDocumento, $fDocumento, $estado, $estadoPedido;

    public function render()
    {

        return view('livewire.Pedidos.editPedido')
            ->extends('layouts.app')
            ->section('content');;
    }

    public function mount($id)
    {
        $data = DB::select('call sp_pedidoUpdate(?)', array($id));
        $this->nombre = $data[0]->nombre;
        $this->email = $data[0]->email;
        $this->direccion = $data[0]->direccion;
        $this->dni = $data[0]->dni;
        $this->idPedido = $data[0]->idPedido;
        $this->nDocumento = $data[0]->nDocumento;
        $this->fDocumento = $data[0]->fecha;
        $this->estado = $data[0]->estadoPedido;
        $this->estadoPedido = $data[0]->estadoPedido;
    }

    public function update()
    {
        $pedidos = Pedido::find($this->idPedido);
        $pedidos->update([
            'estadoPedido' => $this->estadoPedido,
        ]);
        session()->flash('success', 'El pedido nª 0000' . $this->idPedido . ' ha sido actualizado!');
        return redirect()->route('listPedidos');
    }
}
