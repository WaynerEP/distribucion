<?php

namespace App\Http\Livewire;

use App\Mail\confirmacionEmail;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use DB;

class pedidoController extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $nroDocument, $TipoDoc, $SelectedEmployee, $idEmployee, $nameEmployee, $emailEmployee, $dniEmployee, $igv;
    public $searchCustomer, $idClient, $clientNombre, $clientEmail, $clientDireccion;
    private $pagination = 8;


    public function render()
    {
        $this->getNroDocument();
        $employees = DB::select('call sp_getVendedores');
        $customers = DB::table('cliente as s')
            ->join('ciudadano as c', 's.dni', '=', 'c.dni')
            ->where('c.nombre', 'LIKE', "%$this->searchCustomer%")
            ->select('s.idCliente', 'c.nombre', 'c.dni', 'c.aPaterno', 'c.email', 'c.direccion')
            ->get();
        $orderProducts = session()->has('carrito') ? session('carrito') : [];
        $allProducts = DB::table('producto')
            ->where('nombre', 'LIKE', "%$this->search%")
            ->paginate($this->pagination);
        return view('livewire.Pedidos.create', ['orderProducts' => $orderProducts, 'employees' => $employees, 'customers' => $customers, 'allProducts' => $allProducts])
            ->extends('layouts.app')
            ->section('content');
    }

    // $employees = DB::table('empleado as e')
    // ->join('ciudadano as c', 'e.dni', '=', 'c.dni')
    // ->where('c.nombre', 'LIKE', "%$this->searchEmployee%")
    // ->select('e.idEmpleado', 'c.nombre', 'c.aPaterno', 'e.dni')
    // ->get();

    public function mount()
    {
        $this->igv = 0.18;
        $this->TipoDoc = 'BOLETA';
        if (session()->has('empleado')) {
            $dataEmployee = session('empleado');
            $this->idEmployee = $dataEmployee->idEmpleado;
            $this->nameEmployee = ($dataEmployee->nombre . ' ' . $dataEmployee->aPaterno);
            $this->emailEmployee = $dataEmployee->emailCorporativo;
            $this->dniEmployee = $dataEmployee->dni;
        }
        if (session()->has('cliente')) {
            $dataClient =  session('cliente');
            $this->idClient = $dataClient->idCliente;
            $this->clientNombre = ($dataClient->nombre . ' ' . $dataClient->aPaterno);
            $this->clientEmail = $dataClient->email;
            $this->clientDireccion = $dataClient->direccion;
        }
    }


    public function getNroDocument()
    {
        if ($this->TipoDoc == 'BOLETA') {
            $serie = 'BO-';
            $data = DB::select('call sp_nroDocumento(?)', array('BOLETA'));
        } else {
            $serie = 'FA-';
            $data = DB::select('call sp_nroDocumento(?)', array('FACTURA'));
        }
        $this->nroDocument = $serie . $data[0]->correlativo;
    }


    public function updatedSelectedEmployee($idEmployee)
    {
        $data = DB::table('empleado as e')
            ->join('ciudadano as c', 'e.dni', '=', 'c.dni')
            ->where('e.idEmpleado', '=', "$idEmployee")
            ->select('e.idEmpleado', 'c.nombre', 'c.aPaterno', 'e.emailCorporativo', 'e.dni')->first();
        $this->idEmployee = $data->idEmpleado;
        $this->nameEmployee = ($data->nombre . ' ' . $data->aPaterno);
        $this->emailEmployee = $data->emailCorporativo;
        $this->dniEmployee = $data->dni;
        session(['empleado' => $data]);
        // $this->reset('SelectedEmployee');
        $this->resetValidation('idEmployee');
    }


    //para el cliente
    public function selectedCustomer($id)
    {
        $data = DB::table('cliente as e')
            ->join('ciudadano as c', 'e.dni', '=', 'c.dni')
            ->where('e.idCliente', '=', "$id")
            ->select('e.idCliente', 'c.nombre', 'c.aPaterno', 'c.email', 'c.direccion')->first();
        $this->idClient = $data->idCliente;
        $this->clientNombre = ($data->nombre . ' ' . $data->aPaterno);
        $this->clientEmail = $data->email;
        $this->clientDireccion = $data->direccion;
        session(['cliente' => $data]);
        $this->reset('searchCustomer');
        $this->resetValidation('idClient');
    }



    public function addProduct($id, $n)
    {
        // $this->orderProducts[] = ['product_id' => '', 'price' => '', 'quantity' => 1];
        $carrito = session('carrito');
        $producto = Producto::find($id);
        if (isset($carrito[$id])) {
            $cantidad = $carrito[$id]['cantidad'] + $n;
            $descuento = $carrito[$id]['discount'];
        } else {
            $descuento = 0;
            $cantidad = 1;
        }

        if ($producto->cantidad >= $cantidad) {
            $total = ($producto->precio * $cantidad);
            $contenido = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'discount' => $descuento,
                'importe' => ($total - $descuento),
            ];
            $carrito[$id] = $contenido;
            session(['carrito' => $carrito]);
        } else {
            $this->emit('error_stock', 'Stock No disponible, solo existen ' . $producto->cantidad . ' productos');
        }
    }


    public function addQuantity($id, $n)
    {
        // $this->orderProducts[] = ['product_id' => '', 'price' => '', 'quantity' => 1];

        $carrito = session('carrito');
        $producto = Producto::find($id);
        if (isset($carrito[$id])) {
            $cantidad = $n;
            $descuento = $carrito[$id]['discount'];
        } else {
            $descuento = 0;
            $cantidad = 1;
        }
        if ($cantidad == 0) {
            $this->removeProduct($id);
            return;
        }
        if ($producto->cantidad >= $cantidad && $producto->cantidad > 0) {
            $total = ($producto->precio * $cantidad);
            $contenido = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'discount' => $descuento,
                'importe' => ($total - $descuento),
            ];
            $carrito[$id] = $contenido;
            session(['carrito' => $carrito]);
        } else {
            $this->emit('error_stock', 'Stock No disponible, existen ' . $producto->cantidad . ' productos');
        }
    }

    public function decrease($index)
    {
        $carrito = session('carrito');
        $producto = Producto::find($index);
        $cantidad = $carrito[$index]['cantidad'] - 1;
        if ($cantidad == 0) {
            $this->removeProduct($index);
            return;
        }
        $descuento = $carrito[$index]['discount'];
        $total = ($producto->precio * $cantidad);
        $contenido = [
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => $cantidad,
            'discount' => $descuento,
            'importe' => ($total - $descuento),
        ];
        $carrito[$index] = $contenido;
        session(['carrito' => $carrito]);
    }


    public function applyDiscount($index, $dscto)
    {

        if ($dscto == null) {
            $discount = 0;
        } else {
            $discount = $dscto;
        }
        $carrito = session('carrito');
        $producto = Producto::find($index);
        $cantidad = $carrito[$index]['cantidad'];
        // $descuento = $carrito[$index]['discount'];
        $total = ($producto->precio * $cantidad);
        $contenido = [
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => $cantidad,
            'discount' => $discount,
            'importe' => ($total - $discount),
        ];
        $carrito[$index] = $contenido;
        session(['carrito' => $carrito]);
    }

    public function store()
    {

        $this->validate(
            [
                'idEmployee' => 'required',
                'idClient' => 'required',
                'TipoDoc' => 'required',
            ],
            [
                'idEmployee.required' => 'Seleccione un empleado',
                'idClient.required' => 'Seleccione un cliente',
                'TipoDoc.required' => 'Seleccione el tipo de Documento',
            ]
        );
        if (session()->has('carrito')) {
            if (count(session('carrito')) > 0) {
                $data = Pedido::create([
                    'tipoDocumento' => $this->TipoDoc,
                    'nDocumento' => $this->nroDocument,
                    'idCliente' => $this->idClient,
                    'idEmpleado' => $this->idEmployee
                ]);
                $id = $data->idPedido;
                $carrito = session('carrito');

                foreach ($carrito as $index => $car) {
                    DetallePedido::create([
                        'cantidadPedida' => $carrito[$index]['cantidad'],
                        'idPedido' => $id,
                        'idProducto' => $index,
                        'descuento' => $carrito[$index]['discount']
                    ]);
                }

                // $dataPedidos = DB::select('call sp_PedidosClientes(?)', array($id));
                // $dataProductos = DetallePedido::join('producto as p', 'p.idProducto', '=', 'detallePedido.idProducto')
                //     ->select('detallePedido.idPedido', 'p.nombre', 'p.precio', 'p.image', 'detallePedido.cantidadPedida', 'detallePedido.descuento')
                //     ->where('detallePedido.idPedido', '=', $id)
                //     ->get();
                // $data = json_decode($dataProductos);
                // Mail::to('kperezespi@gmail.com')->send(new confirmacionEmail($dataPedidos, $data));

                $this->emit('order-stored', 'Pedido registrado correctamente!');

                $this->resetUI();
            } else {
                $this->emit('errors', 'Seleccione productos!');
            }
        } else {
            $this->emit('errors', 'Seleccione productos!');
        }
    }

    public function removeProduct($index)
    {
        $carrito = session('carrito');
        unset($carrito[$index]);
        session(['carrito' => $carrito]);
    }


    public function resetUI()
    {
        $this->TipoDoc = 'BOLETA';
        $this->reset('idClient', 'clientNombre', 'clientEmail', 'clientDireccion', 'nroDocument');
        session()->forget('cliente');
        session()->forget('carrito');
        $this->resetValidation();
    }

    public function resetAll()
    {
        $this->resetUI();
        $this->resetUiEmpleado();
    }

    public function resetUIEmpleado()
    {
        $this->reset('idEmployee', 'nameEmployee', 'dniEmployee', 'emailEmployee','SelectedEmployee');
        session()->forget('empleado');
    }
}
