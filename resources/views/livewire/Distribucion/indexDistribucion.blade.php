@section('titlePage')
    <h3>Nuevos Pedidos</h3>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/elements/breadcrumb.css') }}" rel="stylesheet" type="text/css">
@endsection
<div class="row layout-top-spacing">
    <div class="col-lg-6 col-6">
        <nav class="breadcrumb-two mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Distribución</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Asignar</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-6 col-6 text-right d-flex justify-content-between">
        <div class="contacts-block__item">
            {{ \Carbon\Carbon::now()->format('j F, Y') }}
        </div>
        <div>
            <button class="btn btn-primary btn-sm" wire:click="store">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-truck mr-2">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                </svg> Enviar Pedidos</button>
        </div>
    </div>

    <div class="col-lg-5 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header px-3 pt-2">
            </div>
            <div class="widget-content widget-content-area">
                <label for="" class="text-primary">Zona</label>
                <div class="input-group mb-2">
                    <input type="text" wire:model="zona" class="form-control" placeholder="Seleccione zona"
                        aria-label="notification">
                    <div class="input-group-append">
                        <button type="button" class="input-group-text" data-toggle="modal" data-target="#modalZona">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="distrito" class="text-primary">Distrito</label>
                        <input type="text" wire:model="distrito" class="form-control" id="distrito"
                            placeholder="Distrito...">
                    </div>
                </div>

                <label for="vehiculo" class="text-primary">Vehículo</label>
                <div class="input-group mb-2">
                    <input type="text" wire:model="transporte" class="form-control"
                        placeholder="Seleccione un vehículo">
                    <div class="input-group-append">
                        <button type="button" class="input-group-text" data-toggle="modal"
                            data-target="#modalTransporte">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="comb" class="text-primary">Monto Combust.</label>
                        <input type="text" class="form-control" id="comb" placeholder="Mto Combustible...">
                    </div>
                </div>
                <label for="transportista" class="text-primary">Transportista</label>
                <div class="input-group mb-2">
                    <select id="transportista" wire:model="SelectedConductor" class="form-control">
                        <option value="">Seleccione...</option>
                        @foreach ($conductores as $c)
                            <option value="{{ $c->idEmpleado }}">👨‍💼 {{ $c->conductor }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button type="button" class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user-plus">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="email" class="text-primary">Email</label>
                        <input type="text" wire:model="email" class="form-control" id="email" placeholder="Email...">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputZip" class="text-primary">Teléfono</label>
                        <input type="text" wire:model="telefono" class="form-control" placeholder="Telefono..."
                            id="inputZip">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header px-3 pt-2">
            </div>
            <div class="widget-content widget-content-area">
                <label for="" class="text-primary">Lista de Pedidos</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Seleccione una lista de Pedidos..."
                        aria-label="notification">
                    <div class="input-group-append">
                        <button type="button" class="input-group-text" data-toggle="modal" data-target="#modalPedido">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trello">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <rect x="7" y="7" width="3" height="9"></rect>
                                <rect x="14" y="7" width="3" height="5"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="form-group col-md-12">
                        <label for="montoasig" class="text-primary">Monto Asignado</label>
                        <input type="text" wire:model="montoAsignado" class="form-control" id="montoasig"
                            placeholder="Monto asigando...">
                    </div>
                </div>
                <label for="detail" class="text-primary">Detalle <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down">
                        <polyline points="7 13 12 18 17 13"></polyline>
                        <polyline points="7 6 12 11 17 6"></polyline>
                    </svg></label>

                <div class="table-responsive table-bordered table-hover table-striped"
                    style="max-height: 360px; overflow: auto;">
                    <table class="table table-bordered item-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PEDIDO</th>
                                <th>CLIENTE</th>
                                <th>MONTO</th>
                                <th class="text-center">ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($detailPedidos) > 0)
                                @foreach ($detailPedidos as $dp)
                                    <tr>
                                        <td>{{ $dp->idPedido }}</td>
                                        <td>{{ $dp->nDocumento }}</td>
                                        <td>{{ $dp->cliente }}</td>
                                        <td>{{ number_format($dp->monto, 2) }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm"
                                                wire:click="getDetailsProducts({{ $dp->idPedido }})">view</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">Sin resultados!
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Modal -->

        </div>
    </div>
    {{-- Modal --}}
    @include('Livewire.Distribucion.modalZonas')
    @include('Livewire.Distribucion.modalTransporte')
    @include('Livewire.Distribucion.modalListaPedidos')
    @include('Livewire.Reportes.details')
    <div wire:loading wire:target="store">
        <div class="blockUI blockOverlay"
            style="z-index: 1200; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(27, 32, 36); opacity: 0.8; cursor: wait; position: fixed;">
        </div>
        <div class="blockUI blockMsg blockPage"
            style="z-index: 1201; position: fixed; padding: 0px; margin: 0px; width: 30%; top: 40%; left: 35%; text-align: center; color: rgb(255, 255, 255); border: 0px; background-color: transparent; cursor: wait;">
            <img src="{{ asset('assets/img/loading.gif') }}" alt=""> Cargando
        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('closeModalZona', message => {
                $('#modalZona').modal('hide');
            });
            window.livewire.on('closeModalTransporte', message => {
                $('#modalTransporte').modal('hide');
            });
            window.livewire.on('closeModalPedidos', message => {
                $('#modalPedido').modal('hide');
            });
            window.livewire.on('show-modal', message => {
                $('#detailsModal').modal('show');
            });
            window.livewire.on('order-stored', message => {
                swal({
                    title: 'Hecho!',
                    text: 'Los pedidos van en camino.',
                    imageUrl: 'https://i.pinimg.com/originals/c4/9a/20/c49a207e0f89c9290d98fd43a87a8cb0.gif',
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    animation: false,
                    padding: '2em'
                })
            });
        });
    </script>
@endsection
