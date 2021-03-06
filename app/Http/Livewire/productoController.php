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

    public $selected_id, $codigo, $image, $nombre, $cantidad, $precio, $idAlmacen, $idCategoriaProducto, $title, $search, $filter, $photoProduct;
    private $pagination = 8;

    public function render()
    {
        $data = DB::table('producto as p')->join('categoriaProducto as cp', 'p.idCategoriaProducto', '=', 'cp.idCategoriaProducto')
            ->select('p.idProducto', 'p.nombre', 'p.cantidad', 'p.precio', 'p.image', 'cp.nombre as categoria')
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
                'nombre' => 'required|max:80|min:3|unique:producto',
                'cantidad' => 'required|numeric|min:0|not_in:0',
                'precio' => 'required|numeric|min:0|not_in:0',
                'idCategoriaProducto' => 'required',
                'idAlmacen' => 'required',
            ],
            [
                'nombre.required' => 'El nombre del producto es obligatorio',
                'nombre.max' => 'El producto debe contener como maximo 50 caracteres',
                'nombre.min' => 'El producto debe contener al menos 3 caracteres',
                'nombre.unique' => 'Ya existe el nombre del producto',
                'cantidad.required' => 'La cantidad es obligatorio',
                'cantidad.numeric' => 'La cantidad debe ser un número',
                'cantidad.min' => 'La cantidad debe ser mayor a 0',
                'cantidad.not_in' => 'La cantidad debe ser mayor a 0',
                'precio.required' => 'Campo obligatorio',
                'precio.numeric' => 'La precio debe ser un número',
                'precio.min' => 'La precio debe ser mayor a 0',
                'precio.not_in' => 'La precio debe ser mayor a 0',
                'idCategoriaProducto.required' => 'Campo obligatorio',
                'idAlmacen.required' => 'Campo obligatorio',
            ]
        );
        $producto = Producto::create([
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
        $this->emit('product-added', 'Producto Registrado');
    }



    public function Edit(Producto $producto)
    {
        $this->resetUI();
        $this->codigo = $producto->codigo;
        $this->nombre = $producto->nombre;
        $this->cantidad = $producto->cantidad;
        $this->precio = number_format($producto->precio, 2);
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
                'nombre' => 'required|max:80|min:3|unique:producto,nombre,' . $this->selected_id . ',idProducto',
                'cantidad' => 'required|numeric|min:0|not_in:0',
                'precio' => 'required|numeric|min:0|not_in:0',
                'idCategoriaProducto' => 'required',
                'idAlmacen' => 'required',
            ],
            [
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
            'nombre' => $this->nombre,
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
        $this->emit('product-updated', 'Producto Actualizado!');
    }


    protected $listeners = ['deleteRow' => 'destroy'];

    public function destroy(Producto $producto)
    {
        $imageName = $producto->image;
        if ($imageName !== null) {
            unlink('storage/products/' . $imageName);
        }
        $producto->delete();
        $this->resetUI();
        $this->emit('producto-destroyed', 'Producto Eliminado');
    }


    public function resetUI()
    {
        $this->reset('codigo', 'nombre', 'cantidad', 'precio', 'idAlmacen', 'idCategoriaProducto', 'image', 'photoProduct', 'title', 'selected_id');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
