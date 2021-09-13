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
}
