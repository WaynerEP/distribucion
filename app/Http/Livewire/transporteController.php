<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

use App\Models\Transporte;
use DB;

class transporteController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $selected_id, $search, $title, $matricula, $capacidad, $fAdquisicion, $fVehiculo, $altura, $ancho, $capacidadCombustible;
    private $pagination = 8;



    public function render()
    {
        $data = DB::table('transporte')
            ->where('matricula', 'LIKE', "%$this->search%")
            ->paginate($this->pagination);
        return view('livewire.Transporte.index', ['transportes' => $data])
            ->extends('layouts.app')
            ->section('content');;;
    }



    public function Store()
    {
        $this->validate(
            [
                'matricula' => 'required|min:9|unique:transporte',
                'capacidad' => 'required|numeric|min:0|not_in:0',
                'fAdquisicion' => 'required',
                'fVehiculo' => 'required',
                'altura' => 'required|numeric|min:0|not_in:0',
                'ancho' => 'required|numeric|min:0|not_in:0',
                'capacidadCombustible' => 'required|numeric|min:0|not_in:0',
            ],
            [
                'matricula.required' => 'Campo obligatorio',
                'matricula.min' => 'Debe ser de 9 caracteres',
                'matricula.unique' => 'Ya existe el número de matricula',
                'capacidad.required' => 'Campo obligatorio',
                'capacidad.numeric' => 'El campo debe ser un número',
                'capacidad.min' => 'El campo debe ser mayor a 0',
                'capacidad.not_in' => 'El campo debe ser mayor a 0',
                'fAdquisicion.required' => 'Campo obligatorio',
                'fVehiculo.required' => 'Campo obligatorio',
                'altura.required' => 'Campo obligatorio',
                'altura.numeric' => 'El campo debe ser un número',
                'altura.min' => 'El campo debe ser mayor a 0',
                'altura.not_in' => 'El campo debe ser mayor a 0',
                'ancho.required' => 'Campo obligatorio',
                'ancho.numeric' => 'El campo debe ser un número',
                'ancho.min' => 'El campo debe ser mayor a 0',
                'ancho.not_in' => 'El campo debe ser mayor a 0',
                'capacidadCombustible.required' => 'Campo obligatorio',
                'capacidadCombustible.numeric' => 'El campo debe ser un número',
                'capacidadCombustible.min' => 'El campo debe ser mayor a 0',
                'capacidadCombustible.not_in' => 'El campo debe ser mayor a 0',
            ]
        );

        Transporte::create([
            'matricula' => $this->matricula,
            'capacidad' => $this->capacidad,
            'fAdquisicion' => $this->fAdquisicion,
            'fVehiculo' => $this->fVehiculo,
            'altura' => $this->altura,
            'ancho' => $this->ancho,
            'capcidadCombustible' => $this->capacidadCombustible,
        ]);

        $this->resetUI();
        $this->emit('transporte-added', 'Vehículo Registrado!');
    }



    public function Edit($id)
    {
        $data = Transporte::find($id);
        $this->matricula = $data->matricula;
        $this->capacidad = $data->capacidad;
        $this->fAdquisicion = $data->fAdquisicion;
        $this->fVehiculo = $data->fVehiculo;
        $this->altura = $data->altura;
        $this->ancho = $data->ancho;
        $this->capacidadCombustible = $data->capcidadCombustible;
        $this->selected_id = $data->idTransporte;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }



    public function Update()
    {
        $this->validate(
            [
                'matricula' => 'required|min:9|unique:transporte,matricula,' . $this->selected_id . ',idTransporte',
                'capacidad' => 'required|numeric|min:0|not_in:0',
                'fAdquisicion' => 'required',
                'fVehiculo' => 'required',
                'altura' => 'required|numeric|min:0|not_in:0',
                'ancho' => 'required|numeric|min:0|not_in:0',
                'capacidadCombustible' => 'required|numeric|min:0|not_in:0',
            ],
            [
                'matricula.required' => 'Campo obligatorio',
                'matricula.min' => 'Debe ser de 9 caracteres',
                'matricula.unique' => 'Ya existe el numero de matricula',
                'capacidad.required' => 'Campo obligatorio',
                'capacidad.numeric' => 'El campo debe ser un número',
                'capacidad.min' => 'El campo debe ser mayor a 0',
                'capacidad.not_in' => 'El campo debe ser mayor a 0',
                'fAdquisicion.required' => 'Campo obligatorio',
                'fVehiculo.required' => 'Campo obligatorio',
                'altura.required' => 'Campo obligatorio',
                'altura.numeric' => 'El campo debe ser un número',
                'altura.min' => 'El campo debe ser mayor a 0',
                'altura.not_in' => 'El campo debe ser mayor a 0',
                'ancho.required' => 'Campo obligatorio',
                'ancho.numeric' => 'El campo debe ser un número',
                'ancho.min' => 'El campo debe ser mayor a 0',
                'ancho.not_in' => 'El campo debe ser mayor a 0',
                'capacidadCombustible.required' => 'Campo obligatorio',
                'capacidadCombustible.numeric' => 'El campo debe ser un número',
                'capacidadCombustible.min' => 'El campo debe ser mayor a 0',
                'capacidadCombustible.not_in' => 'El campo debe ser mayor a 0',
            ]
        );

        $transporte = Transporte::find($this->selected_id);
        $transporte->Update([
            'matricula' => $this->matricula,
            'capacidad' => $this->capacidad,
            'fAdquisicion' => $this->fAdquisicion,
            'fVehiculo' => $this->fVehiculo,
            'altura' => $this->altura,
            'ancho' => $this->ancho,
            'capcidadCombustible' => $this->capacidadCombustible,
        ]);

        $this->resetUI();
        $this->emit('transporte-updated', 'Vehículo Actualizado!');
    }



    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(Transporte $transporte)
    {
        $date = Carbon::now();
        $fBaja = $date->format('Y-m-d');
        $transporte->Update([
            'fBaja' => $fBaja,
            'estado' => 0,
        ]);
        $this->emit('vehiculo-destroyed', 'Vehiculo Eliminado!');
    }


    public function activeState(Transporte $transporte)
    {
        $transporte->Update([
            'fBaja' => null,
            'estado' => 1,
        ]);
        $this->emit('vehiculo-activated', 'Vehiculo Activado!');
    }



    public function resetUI()
    {
        $this->reset('selected_id', 'search', 'title', 'matricula', 'capacidad', 'fAdquisicion', 'fVehiculo', 'altura', 'ancho', 'capacidadCombustible');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
