<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Ciudadano;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use DB;

class ciudadanoController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $SelectedDepa = null, $SelectedProv = null, $SelectedDist = null;
    public $provincias = null, $distritos = null;
    public $selected_id, $search, $title;
    private $pagination = 8;

    public $dni, $nombre, $aPaterno, $aMaterno, $telefono, $fNacimiento, $email, $direccion, $referencia, $genero, $seguro, $idNivel;

    public function render()
    {
        $data = DB::table('ciudadano')->select('nombre', 'aPaterno', 'aMaterno', 'dni', 'email', 'direccion', 'telefono')
            ->where('nombre', 'LIKE', "%$this->search%")
            ->orWhere('aPaterno', 'LIKE', "%$this->search%")
            ->orWhere('aMaterno', 'LIKE', "%$this->search%  ")
            ->paginate($this->pagination);
        $niveles = DB::table('nivelEstudios')->orderBy('idNivel', 'asc')->get();
        $departamentos = DB::table('departamento')->orderBy('idDepa', 'asc')->get();
        return view('livewire.Ciudadano.index', ['ciudadanos' => $data, 'departamentos' => $departamentos, 'niveles' => $niveles])
            ->extends('layouts.app')
            ->section('content');;
    }




    public function updatedSelectedDepa($id)
    {

        $this->provincias = Provincia::select('idProvincia', 'provincia')->where('idDepa', $id)->orderBy('idProvincia', 'asc')->get();
        $this->reset('distritos');
    }




    public function updatedSelectedProv($id)
    {
        $this->distritos = Distrito::select('idDistrito', 'distrito')->where('idProvincia', $id)->orderBy('idDistrito', 'asc')->get();
    }




    public function Store()
    {
        $this->validate(
            [
                'dni' => 'required|min:8|unique:ciudadano',
                'nombre' => 'required|max:50|min:3',
                'aPaterno' => 'required|max:30|min:3',
                'aMaterno' => 'required|max:30|min:3',
                'fNacimiento' => 'required',
                'email' => 'required|email|max:100|unique:ciudadano',
                'telefono' => 'required|max:20',
                'genero' => 'required',
                'SelectedDist' => 'required',
                'direccion' => 'required',
                'idNivel' => 'required',
            ],
            [
                'dni.required' => 'Campo obligatorio',
                'dni.min' => 'Debe ser de 8 dígitos',
                'dni.unique' => 'Ya existe el dni',
                'nombre.required' => 'El nombre es obligatorio',
                'nombre.max' => 'El nombre debe contener como maximo 30 caracteres',
                'nombre.min' => 'La nombre debe contener al menos 3 caracteres',
                'aPaterno.required' => 'El primer apellido es obligatorio',
                'aPaterno.max' => 'El primer apellido debe contener como maximo 30 caracteres',
                'aPaterno.min' => 'La primer apellido debe contener al menos 3 caracteres',
                'aMaterno.required' => 'El segundo apellido es obligatorio',
                'aMaterno.max' => 'El egundo apellido debe contener como maximo 30 caracteres',
                'aMaterno.min' => 'La segundo apellido debe contener al menos 3 caracteres',
                'fNacimiento.required' => 'Campo obligatorio',
                'email.required' => 'Campo obligatorio',
                'email.email' => 'Incluye un signo @ en el email',
                'email.max' => 'Puedes incluir como máximo 100 caracteres',
                'email.unique' => 'El email ya ha sido registrado.',
                'telefono.required' => 'Campo obligatorio',
                'telefono.max' => 'Puedes incluir como máximo 20 caracteres',
                'genero.required' => 'Campo obligatorio',
                'SelectedDist.required' => 'Campo obligatorio',
                'direccion.required' => 'Campo obligatorio',
                'idNivel.required' => 'Campo obligatorio',

            ]
        );
        Ciudadano::create([
            'dni' => $this->dni,
            'nombre' => $this->nombre,
            'aPaterno' => $this->aPaterno,
            'aMaterno' => $this->aMaterno,
            'telefono' => $this->telefono,
            'fNacimiento' => $this->fNacimiento,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'genero' => $this->genero,
            'seguro' => $this->seguro,
            'idNivel' => $this->idNivel,
            'idDistrito' => $this->SelectedDist,
        ]);
        $this->resetUI();
        $this->emit('ciudadano-added', 'Ciudadano Registrado!');
    }


    public function Edit($id)
    {
        $dni = str_pad($id, 8, "0", STR_PAD_LEFT);
        $data = Ciudadano::find($dni);
        $this->dni = $data->dni;
        $this->nombre = $data->nombre;
        $this->aPaterno = $data->aPaterno;
        $this->aMaterno = $data->aMaterno;
        $this->telefono = $data->telefono;
        $this->fNacimiento = $data->fNacimiento;
        $this->email = $data->email;
        $this->direccion = $data->direccion;
        $this->referencia = $data->referencia;
        $this->genero = $data->genero;
        $this->seguro = $data->seguro;
        $this->idNivel = $data->idNivel;
        $this->SelectedDist = $data->idDistrito;
        $this->selected_id = $data->dni;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }




    public function Update()
    {
        $this->validate(
            [
                'dni' => 'required|min:8|unique:ciudadano,dni,' . $this->selected_id . ',dni',
                'nombre' => 'required|max:50|min:3',
                'aPaterno' => 'required|max:30|min:3',
                'aMaterno' => 'required|max:30|min:3',
                'fNacimiento' => 'required',
                'email' => 'required|email|max:100|unique:ciudadano,email,' . $this->selected_id . ',dni',
                'telefono' => 'required|max:20',
                'genero' => 'required',
                'SelectedDist' => 'required',
                'direccion' => 'required',
                'idNivel' => 'required',
            ],
            [
                'dni.required' => 'Campo obligatorio',
                'dni.min' => 'Debe ser de 8 dígitos',
                'dni.unique' => 'Ya existe el dni',
                'nombre.required' => 'El nombre es obligatorio',
                'nombre.max' => 'El nombre debe contener como maximo 30 caracteres',
                'nombre.min' => 'La nombre debe contener al menos 3 caracteres',
                'aPaterno.required' => 'El primer apellido es obligatorio',
                'aPaterno.max' => 'El primer apellido debe contener como maximo 30 caracteres',
                'aPaterno.min' => 'La primer apellido debe contener al menos 3 caracteres',
                'aMaterno.required' => 'El segundo apellido es obligatorio',
                'aMaterno.max' => 'El egundo apellido debe contener como maximo 30 caracteres',
                'aMaterno.min' => 'La segundo apellido debe contener al menos 3 caracteres',
                'fNacimiento.required' => 'Campo obligatorio',
                'email.required' => 'Campo obligatorio',
                'email.email' => 'Incluye un signo @ en el email',
                'email.max' => 'Puedes incluir como máximo 100 caracteres',
                'email.unique' => 'El email ya ha sido registrado.',
                'telefono.required' => 'Campo obligatorio',
                'telefono.max' => 'Puedes incluir como máximo 20 caracteres',
                'genero.required' => 'Campo obligatorio',
                'SelectedDist.required' => 'Campo obligatorio',
                'direccion.required' => 'Campo obligatorio',
                'idNivel.required' => 'Campo obligatorio',

            ]
        );
        $ciudadano = Ciudadano::find($this->selected_id);
        $ciudadano->Update([
            'dni' => $this->dni,
            'nombre' => $this->nombre,
            'aPaterno' => $this->aPaterno,
            'aMaterno' => $this->aMaterno,
            'telefono' => $this->telefono,
            'fNacimiento' => $this->fNacimiento,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'genero' => $this->genero,
            'seguro' => $this->seguro,
            'idNivel' => $this->idNivel,
            'idDistrito' => $this->SelectedDist,
        ]);
        $this->resetUI();
        $this->emit('ciudadano-updated', 'Ciudadano Actualizado!');
    }


    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(Ciudadano $ciudadano)
    {
        $ciudadano->delete();
        $this->resetUI();
        $this->emit('ciudadano-destroyed', 'Ciudadano Eliminado');
    }



    public function resetUI()
    {
        $this->reset('title', 'search', 'selected_id', 'dni', 'nombre', 'aPaterno', 'aMaterno', 'telefono', 'fNacimiento', 'email', 'direccion', 'referencia', 'genero', 'seguro', 'idNivel');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
