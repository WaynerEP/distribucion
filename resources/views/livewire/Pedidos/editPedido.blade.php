@section('styles')
    <link href="{{ asset('assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('titlePage')
    <h3>Nuevos Pedidos</h3>
@endsection

<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="doc-container">
            <div class="row invoice layout-top-spacing layout-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="">
                            <div  class=" row">
                        <div class="col-xl-9">

                            <div class="invoice-content">

                                <div class="invoice-detail-body">
                                    <div class="invoice-detail-title">

                                        <div class="invoice-logo row d-flex">
                                            <div class="col-sm-6 col-12 my-auto">
                                                <img alt="avatar" src="{{ asset('assets/img/logo.png') }}"
                                                    class="img-fluid rounded w-100">
                                            </div>
                                            <div class="col-sm-6 align-self-center">
                                                <p class="inv-street-addr">A'mu Distribuciones S.A</p>
                                                <p class="inv-email-address">amu@amudistricion.com</p>
                                                <p class="inv-email-address">+51 963258741</p>
                                            </div>
                                        </div>

                                        <div class="invoice-title">
                                            <div class="col-sm-6 text-primary">
                                                <p class="inv-list-number"><span class="inv-title">Pedido</span>
                                                    <span
                                                        class="inv-number">#{{ str_pad($idPedido, 5, '0', STR_PAD_LEFT) }}</span>
                                                </p>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="invoice-detail-header">

                                        <div class="row justify-content-between">

                                            <div class="col-xl-9 invoice-address-client">

                                                <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-shopping-bag">
                                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z">
                                                        </path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg> Cliente:</h4>

                                                <div class="invoice-address-client-fields">

                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Nombre</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" wire:model="nombre"
                                                                class="form-control form-control-sm" id="name" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-email"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" wire:model="email"
                                                                class="form-control form-control-sm" id="client-email"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="direccion"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Dirección</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" wire:model="direccion"
                                                                class="form-control form-control-sm" id="client-address"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dni"
                                                            class="col-sm-3 col-form-label col-form-label-sm">DNI</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" wire:model="dni"
                                                                class="form-control form-control-sm" id="dni" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="invoice-detail-terms">
                                        <div class="row justify-content-between">
                                            <div class="col-md-3">
                                                <div class="form-group mb-4">
                                                    <label for="number">Número de Documento</label>
                                                    <input type="text" wire:model="nDocumento"
                                                        class="form-control form-control-sm" id="number" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-4">
                                                    <label for="date">Fecha</label>
                                                    <input type="text" wire:model="fDocumento"
                                                        class="form-control form-control-sm" id="" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for="due mb-3">Estado del Pedido </label>
                                                    @if ($estado != 4 && $estado != 0)
                                                        <select id="inputState" wire:model="estadoPedido"
                                                            class="form-control">
                                                            <option value="" disabled>Seleccione...</option>
                                                            <option value="0">Cancelado</option>
                                                            <option value="1">Confirmado</option>
                                                            <option value="2">Envio en reparto</option>
                                                            <option value="3">Entregado</option>
                                                        </select>
                                                    @endif
                                                    @if ($estado == 3)
                                                        <span class="badge badge-success"> ENTREGADO AL CLIENTE </span>
                                                    @endif
                                                    @if ($estado == 0)
                                                        <span class="badge badge-danger"> CANCELADO </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="invoice-actions-btn">
                                <div class="invoice-action-btn">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-4">
                                            @if ($estado != 3 && $estado != 0)
                                                <a href="javascript:void(0);" wire:click="update()"
                                                    class="btn btn-primary btn-send">
                                                    <div wire:loading wire:target="update"
                                                        class="spinner-border text-white mr-2 align-self-center loader-sm ">
                                                        Loading...
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-save">
                                                        <path
                                                            d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z">
                                                        </path>
                                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                        <polyline points="7 3 7 8 15 8"></polyline>
                                                    </svg>
                                                    Guardar
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-xl-12 col-md-4">
                                            <a href="{{ route('listPedidos') }}" class="btn btn-success btn-download">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-corner-up-left">
                                                    <polyline points="9 14 4 9 9 4"></polyline>
                                                    <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                                </svg> Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
