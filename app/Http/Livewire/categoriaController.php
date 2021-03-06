<?php

namespace App\Http\Livewire;

use App\Models\Categoria;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class categoriaController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selected_id, $nombre, $search, $title;
    public $pagination = 8;


    public function render()
    {
        $data = DB::table('categoriaProducto')->where('nombre', 'LIKE', "%$this->search%")->orderBy('idCategoriaProducto', 'desc')->paginate($this->pagination);
        return view('livewire.Categorias.index', ['categories' => $data])
            ->extends('layouts.app')
            ->section('content');
    }



    public function Edit($id)
    {
        $dataCategory = Categoria::find($id);
        $this->nombre = $dataCategory->nombre;
        $this->selected_id = $dataCategory->idCategoriaProducto;
        $this->title = true;
        $this->emit('show-modal', 'show-modal!');
    }



    public function Store()
    {
        $this->validate(
            [
                'nombre' => 'required|max:30|min:3|unique:categoriaProducto',
            ],
            [
                'nombre.required' => 'El nombre de la categoria es obligatorio',
                'nombre.max' => 'La categoria debe contener como maximo 30 caracteres',
                'nombre.min' => 'La categoria debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre de la categoria',
            ]
        );
        Categoria::create([
            'nombre' => $this->nombre,
        ]);
        $this->resetUI();
        $this->emit('category-added', 'Categoría Registrada!');
    }


    public function Update()
    {
        $this->validate(
            [
                'nombre' => 'required|max:30|min:3|unique:categoriaProducto,nombre,' . $this->selected_id . ',idCategoriaProducto',
            ],
            [
                'nombre.required' => 'El nombre de la categoria es obligatorio',
                'nombre.max' => 'La categoria debe contener como maximo 30 caracteres',
                'nombre.min' => 'La categoria debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre de la categoria',
            ]
        );

        $category = Categoria::find($this->selected_id);
        $category->Update([
            'nombre' => $this->nombre
        ]);
        $this->resetUI();
        $this->emit('category-updated', 'Categoría Actualizada!');
    }


    protected $listeners = ['deleteRow' => 'destroy'];

    public function destroy(Categoria $category)
    {
        $category->delete();
        $this->resetUI();
        $this->emit('category-destroyed', 'Categoría Eliminada!');
    }


    public function resetUI()
    {
        $this->reset('nombre', 'title', 'search', 'selected_id');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
