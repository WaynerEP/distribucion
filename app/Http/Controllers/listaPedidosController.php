<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class listaPedidosController extends Controller
{
    public function index()
    {
        $data = DB::select('call sp_ListasPedidos');
        return view('ListaPedidos.index', ['data' => $data]);
    }


    public function previewList($id)
    {
        $infoListas = DB::select('call sp_previewInfoListaPedidos(?)', array($id));
        $pedidos = DB::select('call sp_previewListaPedidos(?)', array($id));
        return view('ListaPedidos.previewListaPedidos', ['info' => $infoListas, 'pedidos' => $pedidos]);
    }
}
