@extends('Layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/css/apps/invoice-list.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/alert.css') }}">
@endsection

@section('titlePage')
    <h3>Listado de Pedidos</h3>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            @if (session('success'))
                <div class="alert alert-light-success border-0 mb-4" role="alert"> <button type="button"
                        class="close" data-dismiss="alert" aria-label="Close"> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x close" data-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button> <strong>Mensage :- </strong> {{ session('success') }} </div>
            @endif

            <div class="widget-content widget-content-area br-6">
                <div id="invoice-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table id="invoice-list" class="table table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>N° Doc.</th>
                                    <th>Cliente</th>
                                    <th>Email</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPedidos as $pedido)
                                    <tr>
                                        <td><a href="apps_invoice-preview.html"><span
                                                    class="inv-number">{{ $pedido->idPedido }}</span></a>
                                        </td>
                                        <td><span class="inv-amount">{{ $pedido->nDocumento }}</span></td>
                                        <td>
                                            <p class="align-self-center mb-0 user-name"> {{ $pedido->cliente }} </p>
                                        </td>


                                        <td><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-mail">
                                                    <path
                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                    </path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg> {{ $pedido->email }}</span></td>
                                        <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-calendar">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg> {{ $pedido->fecha }}</span></td>
                                        <td><span class="inv-amount">$/.{{ number_format($pedido->monto, 2) }}</span>
                                        </td>
                                        <td>
                                            @switch($pedido->estadoPedido)
                                                @case(0)
                                                    <span class="badge outline-badge-danger"> Cancelado </span>
                                                @break
                                                @case(1)
                                                    <span class="badge outline-badge-primary"> Confirmado </span>
                                                @break
                                                @case(2)
                                                    <span class="badge outline-badge-warning"> Pedido en Reparto
                                                    </span>
                                                @break
                                                @default
                                                    <span class="badge outline-badge-success"> Pedido Entregado </span>

                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                                    <a class="dropdown-item action-edit"
                                                        href="{{ route('editPedido', $pedido->idPedido) }}"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-3">
                                                            <path d="M12 20h9"></path>
                                                            <path
                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                            </path>
                                                        </svg>Editar Estado</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/apps/invoice-list.js') }}"></script>
@endsection
