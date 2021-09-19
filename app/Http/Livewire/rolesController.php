<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class rolesController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $title, $search, $selected_id, $name, $showPermisos = 0, $permisos = [], $permisosEdit = [], $pers, $roleWithPermission;
    private $paginate = 8;


    public function render()
    {
        $roles = Role::with('permissions')
            ->where('name', 'LIKE', "%$this->search%")
            ->orderBy('name', 'ASC')
            ->paginate($this->paginate);
        return view(
            'livewire.Users.roles',
            [
                'roles' => $roles,
                'permissions' => Permission::all()
            ]
        )
            ->extends('layouts.app')
            ->section('content');
    }


    public function edit($id)
    {
        $this->permisosEdit = [];
        $this->resetValidation();
        $this->roleWithPermission = Role::with('permissions')->find($id);
        $np = count(Permission::all());
        $this->name = $this->roleWithPermission->name;
        $n = count($this->roleWithPermission->permissions);

        if ($n == $np) {
            $this->pers = 0;
            $this->showPermisos = 0;
        } else {
            $this->pers = 1;
            $this->showPermisos = 1;
            // if ($this->title) {
            foreach ($this->roleWithPermission->permissions as $p) {
                $this->permisos[$p->id] = $p->id;
            }
            // }
        }
        $this->title = true;
        $this->selected_id = $this->roleWithPermission->id;
        $this->emit('show-modal', 'show-modal!');
    }



    public function asignarAllPermissions()
    {
        $this->permisos = [];
        $this->resetValidation();
        $this->showPermisos = 0;
        $this->pers = 0;
        $data = Permission::select('id')->get();
        foreach ($data as $d) {
            $this->permisos[] = $d->id;
        }
    }



    public function personalizarPermisos()
    {
        $this->permisos = [];
        $this->resetValidation();
        if ($this->title) {
            foreach ($this->roleWithPermission->permissions as $p) {
                $this->permisos[$p->id] = $p->id;
            }
        }
        $this->showPermisos = 1;
    }


    public function addPermission($id)
    {
        if (isset($this->permisos[$id])) {
            unset($this->permisos[$id]);
        } else {
            $this->permisos[$id] = $id;
        }
    }



    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255|unique:roles',
            'permisos' => 'required',
        ]);
        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permisos);
        $this->resetUI();
        $this->emit('role-stored', '✅ Rol creado exitosamente!');
    }




    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|max:255|unique:roles,name,' . $this->selected_id,
        ]);
        $role = Role::find($this->selected_id);
        $role->name = $this->name;
        $role->save();

        $role->permissions()->sync($this->permisos);
        $this->resetUI();
        $this->emit('role-updated', '✅ Rol actualizado exitosamente!!');
    }




    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(Role $role)
    {
        if ($role->users->count() > 0) {
            $this->emit('role-destroyed', '0');
        } else {
            $role->delete();
            $this->emit('role-destroyed', '1');
        }
    }

    public function resetUI()
    {
        $this->reset(['name', 'title', 'selected_id', 'permisos', 'showPermisos', 'search', 'permisosEdit', 'pers']);
        $this->resetValidation();
    }
}
