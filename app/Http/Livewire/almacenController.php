<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class almacenController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $SelectedDepa = null, $SelectedProv = null, $SelectedDist = null;
    public $provincias = null, $distritos = null;
    public $selected_id, $codigo, $nombre, $direccion, $referencia, $search, $title;
    private $pagination = 8;


    public function render()
    {
        $data = DB::table('almacen')->where('nombre', 'LIKE', "%$this->search%")->orderBy('idAlmacen', 'desc')->simplePaginate($this->pagination);
        return view('livewire.Almacen.index', ['almacenes' => $data, 'departamentos' => Departamento::all()])
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


    public function Edit($id)
    {
        $dataAlmacen = Almacen::find($id);
        $this->codigo = $dataAlmacen->codigo;
        $this->nombre = $dataAlmacen->nombre;
        $this->direccion = $dataAlmacen->direccion;
        $this->referencia = $dataAlmacen->referencia;
        $this->SelectedDist = $dataAlmacen->idDistrito;
        $this->selected_id = $dataAlmacen->idAlmacen;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }



    public function Store()
    {
        $this->validate(
            [
                'nombre' => 'required|max:50|min:3|unique:almacen',
                'direccion' => 'required|max:150|min:3',
                'SelectedDist' => 'required',
            ],
            [
                'nombre.required' => 'El nombre del almacen es obligatorio',
                'nombre.max' => 'El almacen debe contener como maximo 50 caracteres',
                'nombre.min' => 'El almacen debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre del almacen',
                'direccion.required' => 'La dirección del almacén es obligatorio',
                'direccion.max' => 'La dirección debe contener como maximo 150 caracteres',
                'direccion.min' => 'La dirección debe contener al menos 3 caracteres',
                'SelectedDist.required' => 'Campo obligatorio',
            ]
        );
        Almacen::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'idDistrito' => $this->SelectedDist,
        ]);
        $this->resetUI();
        $this->emit('almacen-added', 'Almacén Registrado!');
    }


    public function Update()
    {
        $this->validate(
            [
                'codigo' => 'required|max:6|min:3|unique:almacen,codigo,' . $this->selected_id . ',idAlmacen',
                'nombre' => 'required|max:50|min:3|unique:almacen,nombre,' . $this->selected_id . ',idAlmacen',
                'direccion' => 'required|max:150|min:3',
                'SelectedDist' => 'required',
            ],
            [
                'codigo.required' => 'El código es obligatorio',
                'codigo.unique' => 'Ya existe el código del Almacén',
                'codigo.max' => 'El código debe contener como máximo 6 caracteres',
                'nombre.required' => 'El nombre del almacen es obligatorio',
                'nombre.max' => 'El almacen debe contener como maximo 50 caracteres',
                'nombre.min' => 'El almacen debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre del almacen',
                'direccion.required' => 'La dirección del almacén es obligatorio',
                'direccion.max' => 'La dirección debe contener como maximo 150 caracteres',
                'direccion.min' => 'La dirección debe contener al menos 3 caracteres',
                'SelectedDist.required' => 'Campo obligatorio',
            ]
        );

        $almacen = Almacen::find($this->selected_id);
        $almacen->Update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'idDistrito' => $this->SelectedDist,
        ]);
        $this->resetUI();
        $this->emit('almacen-updated', 'Almacen Actualizado!');
    }


    protected $listeners = ['deleteRow' => 'destroy'];

    public function destroy(Almacen $almacen)
    {
        $almacen->delete();
        $this->resetUI();
        $this->emit('almacen-destroyed', 'Almacen Eliminado');
    }


    public function resetUI()
    {
        $this->reset('codigo', 'nombre', 'direccion', 'referencia', 'SelectedDepa', 'SelectedProv', 'SelectedDist', 'title', 'search', 'selected_id');
        $this->resetValidation();
        // $this->resetErrorBag();
    }
}
