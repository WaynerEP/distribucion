<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Zona;
use App\Models\Transporte;
use App\Models\Empleado;
use App\Models\DetallePedido;
use App\Models\Distribucion;
use App\Models\DistribucionTransporte;

use Carbon\Carbon;
use DB;


class DistribucionController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagination = 8,  $zona, $distrito,
        $idTransporte, $transporte, $idConductor, $SelectedConductor, $SelectedEncargado, $email, $telefono;
    public $idZona, $idListaPedidos, $idEncargado, $montoAsignado, $montoCombustible;
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
        $encargados = DB::select('call sp_encargados');
        $pedidos = DB::select('call pedidosListos');
        return view('livewire.Distribucion.indexDistribucion', ['zonas' => $zonas, 'data' => $data, 'conductores' => $conductores, 'encargados' => $encargados, 'pedidos' => $pedidos])
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
        $this->resetValidation('idZona');
        $this->emit('closeModalZona', 'show-modal!');
    }



    public function addTransporte($id, $marca, $capacidad)
    {
        $this->idTransporte = $id;
        $this->transporte = 'Matr. ' . $marca . ' - Cap.' . $capacidad . ' kg';
        $this->resetValidation('idTransporte');
        $this->emit('closeModalTransporte', 'show-modal');
    }



    public function updatedSelectedConductor($id)
    {
        $conductor = Empleado::find($id);
        $this->idConductor = $conductor->idEmpleado;
        $this->email = $conductor->emailCorporativo;
        $this->telefono = $conductor->telefono;
        $this->resetValidation('idConductor');
    }

    public function updatedSelectedEncargado($value)
    {
        $this->idEncargado = $value;
        $this->resetValidation('idEncargado');
    }


    public function addLista($id, $name)
    {
        $this->idListaPedidos = $id;
        $this->listaPedidos = $name;
        $this->resetValidation('idListaPedidos');
        $this->emit('closeModalPedidos', 'show-modal');
    }


    public function store()
    {
        $this->validate(
            [
                'idZona' => 'required',
                'idTransporte' => 'required',
                'montoCombustible' => 'required',
                'idConductor' => 'required',
                'idListaPedidos' => 'required',
                'idEncargado' => 'required',
                'montoAsignado' => 'required',
            ],
            [
                'idZona.required' => 'Seleccione una zona',
                'idTransporte.required' => 'Seleccione un vehículo',
                'montoCombustible.required' => 'Ingrese monto para combustible',
                'idConductor.required' => 'Seleccione un conductor',
                'idListaPedidos.required' => 'Seleccione una lista de Pedidos',
                'idEncargado.required' => 'Seleccione el encargado para la distribución',
                'montoAsignado.required' => 'Ingrese un monto',
            ]
        );
        $data = Distribucion::create([
            'idZona' => $this->idZona,
            'idListaPedidos' => $this->idListaPedidos,
            'idEncargado' => $this->idEncargado,
            'montoAsignado' => $this->montoAsignado,
        ]);

        $idDistribucion = $data->idDistribucion;
        DistribucionTransporte::create([
            'idTransporte' => $this->idTransporte,
            'idConductor' => $this->idConductor,
            'idDistribucion' => $idDistribucion,
            'montoCombustible' => $this->montoCombustible,
        ]);
        $this->resetUI();
        $this->emit('order-stored', 'Loadind data');
    }


    public function getDetailsProducts($id)
    {
        $this->detailsProducts = DetallePedido::join('producto as p', 'p.idProducto', '=', 'detallePedido.idProducto')
            ->select('detallePedido.idPedido', 'p.nombre', 'p.precio', 'p.image', 'detallePedido.cantidadPedida', 'detallePedido.descuento')
            ->where('detallePedido.idPedido', '=', $id)
            ->get();

        $suma = $this->detailsProducts->sum(function ($item) {

            return round((($item->precio * $item->cantidadPedida) - $item->descuento) + ((($item->precio * $item->cantidadPedida) - $item->descuento) * 0.18), 1);
        });

        $this->sumDetails = $suma;

        $this->emit('show-modal', 'Loadind data');
    }


    public function resetUI()
    {
        $this->detailPedidos = [];
        $this->resetValidation();
        $this->reset([
            'idZona',
            'idListaPedidos',
            'listaPedidos',
            'idEncargado',
            'montoAsignado',
            'montoCombustible',
            'zona',
            'idTransporte',
            'transporte',
            'distrito',
            'idConductor',
            'SelectedEncargado',
            'SelectedConductor',
            'email',
            'telefono',
        ]);
    }
}
