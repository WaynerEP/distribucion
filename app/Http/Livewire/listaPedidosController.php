<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;
use App\Models\Pedidos;

class listaPedidosController extends Component
{
    // public $dataPedidos = [];
    public $nombre;
    public function render()
    {
        $nroLista = DB::table("listapedidos as lp")->select(DB::raw('count(*)+1 as nro'))->first();
        $empaquetadores = DB::table('empleado')->get();
        $data = DB::table('pedido as p')->select('dp.idPedido', 'p.nDocumento', 'p.fPedido', 'cd.nombre', 'cd.aPaterno', 'cd.aMaterno', DB::raw('SUM((dp.cantidadPedida*pr.precio-dp.descuento)+((dp.cantidadPedida*pr.precio-dp.descuento)*0.18)) as monto'))
            ->join('cliente as c', 'p.idCliente', '=', 'c.idCliente')
            ->join('ciudadano as cd', 'c.dni', '=', 'cd.dni')
            ->join('detallepedido as dp', 'p.idPedido', '=', 'dp.idPedido')
            ->join('producto as pr', 'dp.idProducto', '=', 'pr.idProducto')
            ->groupBy('dp.idPedido', 'p.nDocumento', 'p.fPedido', 'cd.nombre', 'cd.aPaterno', 'cd.aMaterno')
            ->get();
        $listaPedidos = session()->has('pedidos') ? session('pedidos') : [];
        return view('livewire.ListaPedidos.index', ['nroLista' => $nroLista, 'data' => $data, 'listaPedidos' => $listaPedidos, 'empaquetadores' => $empaquetadores])
            ->extends('layouts.app')
            ->section('content');
    }


    // public function mount()
    // {
    //     session()->forget('pedidos');
    //     $listaPedidos = session()->has('pedidos') ? session('pedidos') : [];
    //     dd($listaPedidos);
    // }
    public function addPedido($id)
    {

        // $this->orderProducts[] = ['product_id' => '', 'price' => '', 'quantity' => 1];
        $carrito = session('pedidos');
        $pedidos = DB::select('call sp_pedidoDetail(?)', array($id));
        $contenido = [
            'id' => $pedidos[0]->idPedido,
            'nroDocumento' => $pedidos[0]->nDocumento,
            'cliente' => $pedidos[0]->cliente,
            'fecha' => $pedidos[0]->fecha,
            'idEmpaquetador' => '',
            'monto' => $pedidos[0]->monto
        ];
        $carrito[$id] = $contenido;
        session(['pedidos' => $carrito]);
    }


    public function addEmpaquetador($id, $em)
    {
        $carrito = session('pedidos');
        $pedidos = DB::select('call sp_pedidoDetail(?)', array($id));
        $contenido = [
            'id' => $pedidos[0]->idPedido,
            'nroDocumento' => $pedidos[0]->nDocumento,
            'cliente' => $pedidos[0]->cliente,
            'fecha' => $pedidos[0]->fecha,
            'idEmpaquetador' => $em,
            'monto' => $pedidos[0]->monto
        ];
        $carrito[$id] = $contenido;
        session(['pedidos' => $carrito]);
    }


    public function removeProduct($index)
    {
        $carrito = session('pedidos');
        unset($carrito[$index]);
        session(['pedidos' => $carrito]);
    }

    public function resetAll()
    {
        $this->reset('nombre');
        session()->forget('pedidos');
        $this->resetValidation();
    }
}
