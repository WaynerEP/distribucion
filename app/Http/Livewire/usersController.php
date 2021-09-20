<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Empleado;
use DB;

class usersController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title, $search, $selected_id, $Empleado, $name, $email, $dni, $role, $status;
    private $paginate = 8;

    public function render()
    {
        $users = User::with('roles')->where('name', 'LIKE', "%$this->search%")->orderBy('idUsuario', 'desc')->paginate($this->paginate);
        $empleados = DB::select('call sp_empleados');
        return view('livewire.Users.users', ['users' => $users, 'empleados' => $empleados, 'roles' => Role::orderBy('name', 'asc')->get()])
            ->extends('layouts.app')
            ->section('content');
    }


    // public function mount()
    // {
    //     $this->status = '1';
    // }
    public function UpdatedEmpleado($idEmpleado)
    {
        $data = Empleado::find($idEmpleado);
        $this->name = $data->ciudadano->nombre . ' ' . $data->ciudadano->aPaterno . ' ' . $data->ciudadano->aMaterno;
        $this->email = $data->emailCorporativo;
        $this->dni = $data->dni;
    }


    public function edit($id)
    {
        $this->title = true;
        $user = User::with('roles')->find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->estado;
        if (count($user->roles) > 0) {
            $this->role = $user->roles[0]->id;
        }
        $this->selected_id = $user->idUsuario;
        $this->emit('show-modal', 'show-modal!');
    }


    public function store()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'status' => ['required'],
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->dni),
            'dniCiudadano' => $this->dni,
            'estado' => $this->status,
        ]);
        $user->assignRole($this->role);
        $this->resetUI();
        $this->emit('user-stored', '✅ Usuario creado exitosamente!');
    }




    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            // 'role' => ['required'],
        ]);
        $user = User::find($this->selected_id);
        $user->Update([
            'name' => $this->name,
            'estado' => $this->status,
        ]);
        $user->roles()->sync($this->role);
        $this->resetUI();
        $this->emit('user-updated', '✅ Usuario actualizado exitosamente!!');
    }




    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(User $user)
    {
        $user->estado = 0;
        $user->save();
        $this->emit('user-destroyed', '❌ El usuario ha sido bloqueado!!');
    }

    public function resetUI()
    {
        $this->reset('Empleado', 'name', 'email', 'dni', 'role', 'title', 'selected_id', 'status');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
