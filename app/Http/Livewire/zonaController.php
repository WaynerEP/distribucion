<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use Livewire\WithPagination;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\Zona;
use DB;


class zonaController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $SelectedDepa = null, $SelectedProv = null, $SelectedDist = null;
    public $provincias = [], $distritos = [];
    public $selected_id, $nombre, $search, $title, $fRegistro;

    private $pagination = 8;


    public function render()
    {
        $data = Zona::with('distrito')->where('nombre', 'LIKE', "%$this->search%")->orderBy('idZona', 'desc')->simplePaginate($this->pagination);

        return view('livewire.Zona.index', ['zonas' => $data, 'departamentos' => Departamento::all()])
            ->extends('layouts.app')
            ->section('content');;
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
        $data = Zona::find($id);
        $this->nombre = $data->nombre;
        $this->fRegistro = $data->fRegistro;
        $this->SelectedDist = $data->idDistrito;
        $this->selected_id = $data->idZona;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }



    public function Store()
    {
        $rules = [
            'nombre' => 'required|min:3|max:50|unique:zona',
            'fRegistro' => 'required',
            'SelectedDist' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El nombre de la zona es obligatorio',
            'nombre.min' => 'La zona deber tener como mínimo 3 caracteres',
            'nombre.max' => 'La zona debe cont como máximo 50 caracteres',
            'nombre.unique' => 'El nombre de la zona ya existe',
            'fRegistro.required' => 'La fecha de registro es obligatorio',
            'SelectedDist.required' => 'El distrito es obligatorio'
        ];
        $this->validate($rules, $messages);
        Zona::create([
            'nombre' => $this->nombre,
            'fRegistro' => $this->fRegistro,
            'idDistrito' => $this->SelectedDist,
        ]);
        $this->resetUI();
        $this->emit('zona-added', 'Zona Registrada!');
    }



    public function Update()
    {
        $rules = [
            'nombre' => 'required|min:3|max:50|unique:zona,nombre,' . $this->selected_id . ',idZona',
            'fRegistro' => 'required',
            'SelectedDist' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El nombre de la zona es obligatorio',
            'nombre.min' => 'La zona deber tener como mínimo 3 caracteres',
            'nombre.max' => 'La zona debe cont como máximo 50 caracteres',
            'nombre.unique' => 'El nombre de la zona ya existe',
            'fRegistro.required' => 'La fecha de registro es obligatorio',
            'SelectedDist.required' => 'El distrito es obligatorio'
        ];
        $this->validate($rules, $messages);
        $zona = Zona::find($this->selected_id);
        $zona->Update([
            'nombre' => $this->nombre,
            'fRegistro' => $this->fRegistro,
            'idDistrito' => $this->SelectedDist,
        ]);
        $this->resetUI();
        $this->emit('zona-updated', 'Zona Actualizada!');
    }



    protected $listeners = ['deleteRow' => 'destroy'];

    public function destroy(Zona $category)
    {
        $category->delete();
        $this->resetUI();
        $this->emit('zona-destroyed', 'Zona Eliminada!');
    }



    public function resetUI()
    {
        $this->reset('nombre', 'fRegistro', 'SelectedDepa', 'SelectedProv', 'SelectedDist', 'title', 'search', 'selected_id','provincias','distritos');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
