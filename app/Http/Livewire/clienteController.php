<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Cliente;
use Carbon\Carbon;
use DB;

class clienteController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selected_id, $search, $title;
    public $dni, $estado, $fIngreso, $ciudadanos, $SelectedCliente;
    private $pagination = 10;


    public function render()
    {
        $data = DB::table('cliente as l')
            ->join('ciudadano as c', 'l.dni', '=', 'c.dni')
            ->select('l.idCliente', 'c.nombre', 'c.aPaterno', 'c.aMaterno', 'c.email', 'c.direccion', 'l.estado')
            ->where('c.nombre', 'LIKE', "%$this->search%")
            ->orderBy('l.idCliente', 'desc')->paginate($this->pagination);
        $this->ciudadanos = DB::table('ciudadano as c')
            ->select('c.dni', 'c.nombre', 'c.aPaterno', 'aMaterno')
            ->leftjoin('cliente as cl', 'c.dni', '=', 'cl.dni')
            ->where('cl.dni', '=', null)
            ->orderBy('c.nombre', 'asc')->get();
        return view('livewire.Clientes.index', ['clientes' => $data])
            ->extends('layouts.app')
            ->section('content');
    }


    public function mount()
    {
        $this->ciudadanos = [];
        $this->estado = 1;
    }


    public function updatedSelectedCliente($id)
    {
        $this->dni = $id;
    }


    public function edit($id)
    {
        $cliente = DB::table('cliente')->where('idCliente', '=', $id)->get();
        $this->SelectedCliente = $cliente[0]->dni;
        $this->estado = $cliente[0]->estado;
        $this->selected_id = $cliente[0]->idCliente;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }



    public function store()
    {
        $this->validate(
            [
                'dni' => 'required',
                'estado' => 'required',
            ],
            [
                'dni.required' => 'Seleccione una persona',
                'estado.required' => 'Seleccione un estado para el cliente',
            ]
        );
        $this->fIngreso = Carbon::now()->format('Y');
        Cliente::create([
            'dni' => $this->dni,
            'fIngreso' => $this->fIngreso,
            'estado' => $this->estado,
        ]);
        $this->resetUI();
        $this->emit('cliente-added', 'Nuevo Cliente Registrado!');
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
        $cliente = Cliente::find($this->selected_id);
        $cliente->Update([
            'estado' => $this->estado,
        ]);
        $this->resetUI();
        $this->emit('cliente-updated', 'Cliente Actualizado!');
    }

    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(Cliente $cliente)
    {
        $cliente->estado = 0;
        $cliente->save();
        $this->emit('cliente-destroyed', 'El cliente ha sido eliminado por el momento!!');
    }

    public function resetUI()
    {
        $this->reset('dni', 'fIngreso',  'title', 'search', 'selected_id', 'SelectedCliente', 'estado');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
