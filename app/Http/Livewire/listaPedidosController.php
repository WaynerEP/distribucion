<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Pedidos;
use App\Models\ListPedidos;
use App\Models\DetalleListaPedido;

class listaPedidosController extends Component
{
    // public $dataPedidos = [];
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 9, $search, $idEmpaquetador = [];
    public function render()
    {
        $nroLista = DB::table("listapedidos as lp")->select(DB::raw('count(*)+1 as nro'))->first();
        $empaquetadores = DB::select('call sp_Empaquetador');
        $listaPedidos = session()->has('pedidos') ? session('pedidos') : [];
        $data = DB::table('pedido as p')->select('dp.idPedido', 'p.nDocumento', 'p.fPedido', 'cd.nombre', 'cd.aPaterno', 'cd.aMaterno', DB::raw('SUM((dp.cantidadPedida*pr.precio-dp.descuento)+((dp.cantidadPedida*pr.precio-dp.descuento)*0.18)) as monto'))
            ->join('cliente as c', 'p.idCliente', '=', 'c.idCliente')
            ->join('ciudadano as cd', 'c.dni', '=', 'cd.dni')
            ->join('detallepedido as dp', 'p.idPedido', '=', 'dp.idPedido')
            ->join('producto as pr', 'dp.idProducto', '=', 'pr.idProducto')
            ->leftjoin('detalleListaPedido as dlp', 'p.idPedido', '=', 'dlp.idPedido')
            ->where('cd.nombre', 'LIKE', "%$this->search%")
            ->where('p.estadoPedido', '=', 0)
            ->where('dlp.idPedido', '=', null)
            ->orderBy('p.fPedido','asc')
            ->groupBy('dp.idPedido', 'p.nDocumento', 'p.fPedido', 'cd.nombre', 'cd.aPaterno', 'cd.aMaterno')
            ->paginate($this->paginate);
        return view('livewire.ListaPedidos.index', ['nroLista' => $nroLista, 'data' => $data, 'listaPedidos' => $listaPedidos, 'empaquetadores' => $empaquetadores])
            ->extends('layouts.app')
            ->section('content');
    }


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
        $this->idEmpaquetador[$id] = $em;
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


    public function store()
    {
        // dd(count($this->idEmpaquetador));
        if (session()->has('pedidos')) {
            if (count(session('pedidos')) != count($this->idEmpaquetador)) {
                $this->emit('error-empaquetador', 'Seleccione correctamente los empaquetadores!');
                return;
            }
            if (count(session('pedidos')) > 0) {
                $dni = Auth()->user()->dniCiudadano;
                $registrador = DB::table('empleado')->select('idEmpleado')->where('dni', '=', $dni)->first();
                $data = ListPedidos::create([
                    'idRegistrador' => $registrador->idEmpleado,
                ]);
                $id = $data->idListaPedidos;
                $carrito = session('pedidos');
                foreach ($carrito as $index => $car) {
                    DetalleListaPedido::create([
                        'idListaPedido' => $id,
                        'idPedido' => $carrito[$index]['id'],
                        'idEmpaquetador' => $carrito[$index]['idEmpaquetador'],
                    ]);
                }
                $this->emit('lista-stored', 'Lista guardada correctamente!');
                $this->resetAll();
            } else {
                $this->emit('errors', 'Seleccione pedidos!');
            }
        } else {
            $this->emit('errors', 'Seleccione pedidos!');
        }
    }



    public function removeProduct($index)
    {
        $carrito = session('pedidos');
        unset($carrito[$index]);
        session(['pedidos' => $carrito]);
        unset($this->idEmpaquetador[$index]);
    }

    public function resetAll()
    {
        // $this->reset('nombreLista');
        session()->forget('pedidos');
        $this->reset('idEmpaquetador', 'idEmpaquetador');
        $this->resetValidation();
    }
}
