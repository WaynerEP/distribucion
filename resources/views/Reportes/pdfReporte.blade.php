<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTES | AM'U DISTRIBUCIONES</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="assets/css/apps/invoice-preview.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row invoice">
            <div class="col-12">

                <div class="doc-container">

                    <div class="row">

                        <div class="col-xl-12">

                            <div class="invoice-container">
                                <div class="invoice-inbox">

                                    <div id="ct"
                                        class="">
                                    
                                    <div class="
                                        invoice-00001">
                                        <div class="content-section">

                                            <center class="inv--head-section inv--detail-section">

                                                <img class="
                                                        company-logo"
                                                    src="assets/img/logo-2.png" alt="company">
                                                <h2 class="in-heading align-self-center">AM'U
                                                    DISTRIBUCIONES.
                                                </h2>
                                                <p>Avenida Gonzales Cáceda #1240</p>
                                                <p>+51 963258741</p>
                                                <p class="inv-list-number" style="margin-top: 2rem"><span
                                                        class="inv-title">
                                                        @if ($tipoReporte)
                                                            Reporte de Pedidos por Fechas
                                                        @else
                                                            Reporte del Día
                                                        @endif
                                                    </span> </p>

                                                @if ($tipoReporte)
                                                    <p class="inv-due-date">
                                                        <span class="inv-title">
                                                            Consultado desde :
                                                        </span>
                                                        <span class="inv-date">{{ $date1 }}</span>
                                                    </p>
                                                    <p class="inv-due-date">
                                                        <span class="inv-title">
                                                            hasta :
                                                        </span>
                                                        <span class="inv-date">{{ $date2 }}</span>
                                                    </p>
                                                @endif

                                            </center>

                                            <div class="inv--detail-section inv--customer-detail-section"
                                                style="padding-top: 0;padding-bottom: -20px !important">
                                                @if ($empleado != 'Todos')
                                                    <p class="inv-to">Info. Empleado</p>

                                                    <p>{{ $empleado[0]->nombre }} {{ $empleado[0]->aPaterno }}
                                                        {{ $empleado[0]->aMaterno }}</p>
                                                    <p>{{ $empleado[0]->emailCorporativo }}</p>
                                                    <p>{{ $empleado[0]->direccion }}</p>
                                                    <p>{{ $empleado[0]->telefono }}</p>
                                                @else
                                                    <h3>Todos los Empleados</h3>
                                                @endif
                                            </div>

                                            <div class="inv--product-table-section">
                                                <table class="table"
                                                    style="padding-left:20px;padding-right:20px !important">
                                                    <thead>
                                                        <tr>
                                                            <th width="%">
                                                                #</th>
                                                            <th class="text-center" width="8%">Importe</th>
                                                            <th class="text-center" width="%">Items</th>
                                                            <th class="text-center" width="30%">Usuario</th>
                                                            <th class="text-center" width="20%">Fecha</th>
                                                            <th class="text-center" width="40%">Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->idPedido }}</td>
                                                                <td class="text-center">
                                                                    S/.{{ number_format($d->monto, 2) }}</td>
                                                                <td class="text-center">{{ $d->nItems }}</td>

                                                                <td class="text-center">{{ $d->nombre }}</td>
                                                                <td class="text-center">{{ $d->fecha }}</td>
                                                                <td class="text-center">@switch($d->estadoPedido)
                                                                        @case(0)

                                                                            Cancelado
                                                                        @break
                                                                        @case(1)
                                                                            Confirmado
                                                                        @break
                                                                        @case(2)
                                                                            Preparando Entrega
                                                                        @break
                                                                        @case(3)
                                                                            Pedido en Reparto
                                                                        @break
                                                                        @default
                                                                            Pedido
                                                                            Entregado
                                                                    @endswitch
                                                                </td>
                                                            </tr>
                                                            <?php $total += $d->monto; ?>
                                                        @endforeach
                                                        <tr>
                                                            <td>TOTALES</td>
                                                            <td colspan="5" class="text-left">
                                                                S/.{{ number_format($total, 2) }}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="inv--note">

                                                <div class="row mt-4">
                                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                        <p>Note: Este es la lista de los Pedidos.</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
</body>

</html>
