<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;
use Carbon\Carbon;
use DB;

class empleadosController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selected_id, $search, $title;
    public $dni, $estado, $telefono, $ciudadanos, $email, $SelectedEmpleado;
    private $pagination = 8;


    public function render()
    {
        $data = DB::table('empleado as l')
            ->join('ciudadano as c', 'l.dni', '=', 'c.dni')
            ->select('l.idEmpleado', 'c.nombre','c.dni', 'c.aPaterno', 'c.aMaterno', 'l.emailCorporativo', 'c.direccion', 'l.telefono', 'l.estado')
            ->where('c.nombre', 'LIKE', "%$this->search%")
            ->orderBy('l.idEmpleado', 'desc')->paginate($this->pagination);
        $this->ciudadanos = DB::table('ciudadano as c')
            ->select('c.dni', 'c.nombre', 'c.aPaterno', 'aMaterno', 'c.telefono', 'c.email')
            ->leftjoin('empleado as cl', 'c.dni', '=', 'cl.dni')
            ->where('cl.dni', '=', null)
            ->orderBy('c.nombre', 'asc')->get();
        return view('livewire.Empleados.index', ['empleados' => $data])
            ->extends('layouts.app')
            ->section('content');
    }



    public function mount()
    {
        $this->ciudadanos = [];
        $this->estado = 0;
    }


    public function updatedSelectedEmpleado($text)
    {
        $cadena = explode('|', $text);
        $correo = explode('@', $cadena[2]);
        $this->dni = $cadena[0];
        $this->telefono = $cadena[1];
        $this->email = $correo[0] . '@amudistribucion.com.pe';
        // $this->telefono = telefono;
    }


    public function edit($id)
    {
        $c = DB::table('empleado')->where('idEmpleado', '=', $id)->get();
        $this->SelectedEmpleado = $c[0]->dni;
        $this->estado = $c[0]->estado;
        $this->telefono = $c[0]->telefono;
        $this->selected_id = $c[0]->idEmpleado;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }



    public function store()
    {
        $this->validate(
            [
                'dni' => 'required',
                'telefono' => 'required',
                'email' => 'required',
            ],
            [
                'dni.required' => 'Seleccione una persona',
                'telefono.required' => 'Seleccione una persona',
                'email.required' => 'Seleccione una persona',
            ]
        );

        Empleado::create([
            'emailCorporativo' => $this->email,
            'dni' => $this->dni,
            'telefono' => $this->telefono,
        ]);
        $this->resetUI();
        $this->emit('empleado-added', 'Nuevo Empleado Registrado!');
    }



    public function update()
    {
        $this->validate(
            [
                'estado' => 'required',
            ],
            [
                'estado.required' => 'Seleccione un estado para el cliente',
            ]
        );
        $c = Empleado::find($this->selected_id);
        $c->Update([
            'estado' => $this->estado,
        ]);
        $this->resetUI();
        $this->emit('empleado-updated', 'Empleado Actualizado!');
    }

    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(Empleado $c)
    {
        $c->estado = 1;
        $c->save();
        $this->emit('empleado-destroyed', 'El empleado ha sido suspendido por el momento!!');
    }

    public function resetUI()
    {
        $this->reset('dni',  'title', 'search', 'selected_id', 'SelectedEmpleado', 'estado', 'telefono','email');
        $this->resetValidation();
    }
}
