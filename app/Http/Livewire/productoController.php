<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Almacen;
use DB;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class productoController extends Component
{

    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $selected_id, $codigo, $image, $nombre, $cantidad, $precio, $idAlmacen, $idCategoriaProducto, $title, $search, $photoProduct;
    private $pagination = 20;

    public function render()
    {
        $data = DB::table('producto as p')->join('categoriaProducto as cp', 'p.idCategoriaProducto', '=', 'cp.idCategoriaProducto')
            ->select('p.idProducto', 'p.nombre', 'p.cantidad', 'p.image', 'p.precio', 'cp.nombre as categoria')
            ->where('p.nombre', 'LIKE', "%$this->search%")
            ->orderBy('p.idProducto', 'desc')
            ->paginate($this->pagination);

        return view('livewire.Productos.index', ['productos' => $data, 'categories' => Categoria::all(), 'almacenes' => Almacen::all()])
            ->extends('layouts.app')
            ->section('content');
    }


    public function Store()
    {
        $this->validate(
            [
                'codigo' => 'required|max:6|min:3|unique:producto',
                'nombre' => 'required|max:50|min:3|unique:producto',
                'cantidad' => 'required|numeric|min:0|not_in:0',
                'precio' => 'required|numeric|min:0|not_in:0',
                'idCategoriaProducto' => 'required',
                'idAlmacen' => 'required',
                'image' => 'image|max:1024',
            ],
            [
                'codigo.required' => 'El código es obligatorio',
                'codigo.unique' => 'Ya existe el código de producto',
                'codigo.max' => 'El código debe contener como máximo 10 caracteres',
                'nombre.required' => 'El nombre del producto es obligatorio',
                'nombre.max' => 'El producto debe contener como maximo 50 caracteres',
                'nombre.min' => 'El producto debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre del producto',
                'cantidad.required' => 'La cantidad es obligatorio',
                'cantidad.numeric' => 'La cantidad debe ser un número',
                'cantidad.min' => 'La cantidad debe ser mayor a 0',
                'cantidad.not_in' => 'La cantidad debe ser mayor a 0',
                'precio.required' => 'La cantidad es obligatorio',
                'precio.numeric' => 'La precio debe ser un número',
                'precio.min' => 'La precio debe ser mayor a 0',
                'precio.not_in' => 'La precio debe ser mayor a 0',
                'idCategoriaProducto.required' => 'Campo obligatorio',
                'idAlmacen.required' => 'Campo obligatorio',
                'image.image' => 'Seleccione una imagen',
                'image.max' => 'Imagen muy grande',
            ]
        );
        $producto = Producto::create([
            'codigo' => $this->codigo,
            'nombre' => strtoupper($this->nombre),
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'idAlmacen' => $this->idAlmacen,
            'idCategoriaProducto' => $this->idCategoriaProducto,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products', $customFileName);

            $producto->image = $customFileName;
            $producto->save();
        }

        $this->resetUI();
        $this->emit('product-added', 'Almacén Registrado');
    }



    public function Edit(Producto $producto)
    {
        $this->resetUI();
        $this->codigo = $producto->codigo;
        $this->nombre = strtoupper($producto->nombre);
        $this->cantidad = $producto->cantidad;
        $this->precio = $producto->precio;
        $this->idAlmacen = $producto->idAlmacen;
        $this->idCategoriaProducto = $producto->idCategoriaProducto;
        $this->photoProduct = $producto->image;

        $this->title = true;
        $this->selected_id = $producto->idProducto;

        $this->emit('show-modal', 'show-modal!');
    }

    public function Update()
    {
        $this->validate(
            [
                'codigo' => 'required|max:6|min:3|unique:producto,codigo,' . $this->selected_id . ',idProducto',
                'nombre' => 'required|max:50|min:3|unique:producto,nombre,' . $this->selected_id . ',idProducto',
                'cantidad' => 'required|numeric|min:0|not_in:0',
                'precio' => 'required|numeric|min:0|not_in:0',
                'idCategoriaProducto' => 'required',
                'idAlmacen' => 'required',
            ],
            [
                'codigo.required' => 'El código es obligatorio',
                'codigo.unique' => 'Ya existe el código de producto',
                'codigo.max' => 'El código debe contener como máximo 10 caracteres',
                'nombre.required' => 'El nombre del producto es obligatorio',
                'nombre.max' => 'El producto debe contener como maximo 50 caracteres',
                'nombre.min' => 'El producto debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre del producto',
                'cantidad.required' => 'La cantidad es obligatorio',
                'cantidad.numeric' => 'La cantidad debe ser un número',
                'cantidad.min' => 'La cantidad debe ser mayor a 0',
                'cantidad.not_in' => 'La cantidad debe ser mayor a 0',
                'precio.required' => 'La cantidad es obligatorio',
                'precio.numeric' => 'La precio debe ser un número',
                'precio.min' => 'La precio debe ser mayor a 0',
                'precio.not_in' => 'La precio debe ser mayor a 0',
                'idCategoriaProducto.required' => 'Campo obligatorio',
                'idAlmacen.required' => 'Campo obligatorio',
            ]
        );

        $producto = Producto::find($this->selected_id);

        $producto->Update([
            'codigo' => $this->codigo,
            'nombre' => strtoupper($this->nombre),
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'idAlmacen' => $this->idAlmacen,
            'idCategoriaProducto' => $this->idCategoriaProducto,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products', $customFileName);
            $imageName = $customFileName;

            $producto->image = $customFileName;
            $producto->save();
            if ($imageName != null) {
                if (file_exists('storage/products' . $imageName)) {
                    unlink('storage/products' . $imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit('product-updated', 'Almacén Actualizado');
    }


    protected $listeners = ['deleteRow' => 'destroy'];

    public function destroy(Producto $producto)
    {
        $imageName = $producto->image;
        $producto->delete();

        if ($imageName !== null) {
            unlink('storage/products/' . $imageName);
        }
        $this->resetUI();
        $this->emit('producto-destroyed', 'Producto Eliminado');
    }


    public function resetUI()
    {
        $this->codigo = '';
        $this->nombre = '';
        $this->cantidad = '';
        $this->precio = '';
        $this->idAlmacen = '';
        $this->idCategoriaProducto = '';
        $this->image = '';
        $this->photoProduct = '';

        $this->title = false;
        $this->selected_id = 0;
    }
}
