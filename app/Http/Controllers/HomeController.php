<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = DB::select('call productosMax');
        $caseritos = DB::select('call caseritos');
        $pedidos = DB::select('select*from v_pedidosByCategoria');
        return view('home', ['products' => $products, 'caseritos' => $caseritos, 'pedidos' => $pedidos]);
    }
}
