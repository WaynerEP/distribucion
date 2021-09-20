<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;

use Spatie\Permission\Models\Permission;
use Livewire\Component;

class permisosController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title, $search, $selected_id, $name;
    private $paginate = 8;


    public function render()
    {
        $permissions = Permission::where('name', 'LIKE', "%$this->search%")->orderBy('id', 'ASC')->paginate($this->paginate);
        return view('livewire.Users.permisos', ['permissions' => $permissions])
            ->extends('layouts.app')
            ->section('content');
    }

    public function edit($id)
    {
        $this->title = true;
        $permission = Permission::find($id);
        $this->name = $permission->name;
        $this->selected_id = $permission->id;
        $this->resetValidation();
        $this->emit('show-modal', 'show-modal!');
    }


    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255|unique:roles',
        ]);
        Permission::create(['name' => $this->name]);
        $this->resetUI();
        $this->emit('permission-stored', '✅ Rol creado exitosamente!');
    }




    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|max:255|unique:permissions,name,' . $this->selected_id,
        ]);
        $role = Permission::find($this->selected_id);
        $role->name = $this->name;
        $role->save();
        $this->emit('permission-updated', '✅ Permiso actualizado exitosamente!!');
        $this->resetUI();
    }




    protected $listeners = ['deleteRow' => 'destroy'];
    public function destroy(Permission $permission)
    {
        if ($permission->roles->count() > 0) {
            $this->emit('permission-destroyed', '0');
        } else {
            $permission->delete();
            $this->emit('permission-destroyed', '1');
        }
    }

    public function resetUI()
    {
        $this->reset('name', 'title', 'selected_id');
        $this->resetValidation();
    }
}
