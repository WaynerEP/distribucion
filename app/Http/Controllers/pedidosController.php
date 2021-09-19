<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetallePedido;
use DB;

class pedidosController extends Controller
{

    public function index()
    {
        return view('Pedidos.create');
    }


    public function listPedidos()
    {
        $dataPedidos = DB::select('call listPedidos');
        return view('Pedidos.list', compact('dataPedidos'));
    }

    public function previewPedidos($id)
    {
        $dc = DB::select('call sp_infoPedidosClientes(?)', array($id));
        $dp = DetallePedido::join('producto as p', 'p.idProducto', '=', 'detallePedido.idProducto')
            ->select('detallePedido.idPedido', 'p.nombre', 'p.precio', 'p.image', 'detallePedido.cantidadPedida', 'detallePedido.descuento')
            ->where('detallePedido.idPedido', '=', $id)
            ->get();
        return view('Pedidos.previewPedidos', compact('dc', 'dp'));
    }
}
