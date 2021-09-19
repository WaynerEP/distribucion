<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class distribucionController extends Controller
{
    public function index()
    {
        $data = DB::select('call sp_listadoDistribucion	');
        return view('Distribucion.listaDistribuciones', ['data' => $data]);
    }


    public function previewDistribucion($id)
    {
        // $infoListas = DB::select('call sp_previewInfoListaPedidos(?)', array($id));
        // $pedidos = DB::select('call sp_previewListaPedidos(?)', array($id));
        // return view('ListaPedidos.previewListaPedidos', ['info' => $infoListas, 'pedidos' => $pedidos]);
    }
}
