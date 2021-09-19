<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Zona;
use App\Models\Transporte;
use App\Models\Empleado;
use App\Models\DetallePedido;

use Carbon\Carbon;
use DB;


class DistribucionController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagination = 8, $idZona, $zona, $distrito, $idListaPedidos,
        $idTransporte, $transporte, $idConductor, $SelectedConductor, $email, $telefono;
    public $montoAsignado, $montoCombustible;
    public $search, $searchTransporte, $listaPedidos, $detailsProducts, $detailPedidos, $sumDetails;


    public function render()
    {
        $this->getDetailsPedido();
        $zonas = Zona::join('distrito as d', 'zona.idDistrito', '=', 'd.idDistrito')
            ->select('zona.idZona', 'zona.nombre', 'd.distrito')
            ->where('zona.nombre', 'LIKE', "%$this->search%")
            ->paginate($this->pagination);
        $data = Transporte::select('idTransporte', 'matricula', 'capacidad', 'estado')
            ->where('matricula', 'LIKE', "%$this->searchTransporte%")
            ->where('estado', '=', '1')
            ->paginate($this->pagination);
        $conductores = DB::select('call sp_conductores');
        $pedidos = DB::select('call sp_ListasPedidos');
        return view('livewire.Distribucion.indexDistribucion', ['zonas' => $zonas, 'data' => $data, 'conductores' => $conductores, 'pedidos' => $pedidos])
            ->extends('layouts.app')
            ->section('content');;
    }

    public function mount()
    {
        $this->detailPedidos = [];
        $this->detailsProducts = [];
        $this->sumDetails = 0;
    }


    public function getDetailsPedido()
    {
        if ($this->idListaPedidos) {
            $this->detailPedidos = DB::select('call sp_previewListaPedidos(?)', array($this->idListaPedidos));
        } else {
            return;
        }
    }

    public function addZona($id, $nameZona, $distrito)
    {
        $this->idZona = $id;
        $this->zona = $nameZona;
        $this->distrito = $distrito;
        $this->emit('closeModalZona', 'show-modal!');
    }



    public function addTransporte($id, $marca, $capacidad)
    {
        $this->idTransporte = $id;
        $this->transporte = 'Matr. ' . $marca . ' - Cap.' . $capacidad . ' kg';
        $this->emit('closeModalTransporte', 'show-modal');
    }



    public function updatedSelectedConductor($id)
    {
        $conductor = Empleado::find($id);
        $this->idConductor = $conductor->id;
        $this->email = $conductor->emailCorporativo;
        $this->telefono = $conductor->telefono;
    }


    public function addLista($id, $name, $n)
    {
        $this->idListaPedidos = $id;
        $this->listaPedidos = $name . ' - ' . $n . ' pedidos';
        $this->emit('closeModalPedidos', 'show-modal');
    }



    public function getDetailsProducts($id)
    {
        $this->detailsProducts = DetallePedido::join('producto as p', 'p.idProducto', '=', 'detallePedido.idProducto')
            ->select('detallePedido.idPedido', 'p.nombre', 'p.precio', 'p.image', 'detallePedido.cantidadPedida', 'detallePedido.descuento')
            ->where('detallePedido.idPedido', '=', $id)
            ->get();

        $suma = $this->detailsProducts->sum(function ($item) {

            return ($item->precio * $item->cantidadPedida)+(($item->precio * $item->cantidadPedida)*0.18);
        });

        $this->sumDetails = $suma;

        $this->emit('show-modal', 'Loadind data');
    }



    public function store() {
        sleep(1);
        $this->emit('order-stored', 'Loadind data');
        
    }
}
