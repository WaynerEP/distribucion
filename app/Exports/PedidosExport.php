<?php

namespace App\Exports;

use App\Models\Pedido;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PedidosExport implements FromArray, WithHeadings
{

    protected $pedidos;
    public function __construct(array $pedidos)
    {
        $this->pedidos = $pedidos;
    }

    public function array(): array
    {
        return $this->pedidos;
    }

    public function headings(): array
    {
        return [
          'N° PEDIDO',
          'TIPO DE DOCUMENTO',
          'N° DE DOCUMENTO',
          'FECHA',
          'ESTADO',
          'EMPLEADO',
          'IMPORTE',
          'ITEMS',
        ];
    }
}
