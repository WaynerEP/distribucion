<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use DB;

class clienteController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $SelectedDepa = null, $SelectedProv = null, $SelectedDist = null;
    public $provincias = [], $distritos = [];
    public $selected_id, $dni, $fIngreso, $search, $title;
    private $pagination = 10;


    public function render()
    {
        $data = DB::table('cliente as l')
            ->join('ciudadano as c', 'l.dni', '=', 'c.dni')
            ->select('l.idCliente', 'c.nombre', 'c.aPaterno', 'c.aMaterno', 'c.email','c.direccion','l.estado')
            ->where('l.dni', 'LIKE', "%$this->search%")
            ->orderBy('l.idCliente', 'desc')->simplePaginate($this->pagination);

        return view('livewire.Clientes.index', ['clientes' => $data, 'departamentos' => Departamento::all()])
            ->extends('layouts.app')
            ->section('content');
    }


    public function updatedSelectedDepa($id)
    {

        $this->provincias = Provincia::select('idProvincia', 'provincia')->where('idDepa', $id)->get();
        $this->reset('distritos');
    }


    public function updatedSelectedProv($id)
    {
        $this->distritos = Distrito::select('idDistrito', 'distrito')->where('idProvincia', $id)->get();
    }



    public function Edit()
    {
    }



    public function Store()
    {
    }



    public function Update()
    {
    }



    public function resetUI()
    {
        $this->reset('dni', 'fIngreso', 'SelectedDepa', 'SelectedProv', 'SelectedDist', 'title', 'search', 'selected_id');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
