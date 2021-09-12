<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

}
