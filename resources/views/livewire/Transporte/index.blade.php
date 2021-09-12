@section('titlePage')
    <h3>Vehículos de transportes</h3>
@endsection
@section('styles')
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
@endsection
<div class="row layout-top-spacing">
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row p-3">
                    <div class="col-md-4 col-6">
                        <div class="full-search search-form-overlay input-focused">
                            <form class="form-inline form-inline search mt-lg-0" role="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <div class="search-bar">
                                    <input type="text" wire:model="search"
                                        class="form-control form-control-sm search-form-control ml-lg-auto"
                                        placeholder="Buscar por n° matrícula...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 col-6 text-right align-items-center my-auto">
                        <button class="btn btn-primary" wire:click="resetUI" data-toggle="modal"
                            data-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Agregar</button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table mb-4">
                        <caption>Lista de todos los vehículos de transporte</caption>
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>N° Matrícula</th>
                                <th>Capacidad (KG)</th>
                                <th>Dimensiones (METROS)</th>
                                <th>Fecha Adq.</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transportes->isNotEmpty())
                                @foreach ($transportes as $transporte)
                                    <tr>
                                        <td class="text-primary">{{ $transporte->idTransporte }}</td>
                                        <td class="text-primary">🚚 {{ $transporte->matricula }}</td>
                                        <td>{{ $transporte->capacidad }}</td>
                                        <td>{{ $transporte->altura }} - {{ $transporte->ancho }} (Metros)</td>
                                        <td>{{ $transporte->fAdquisicion }}</td>
                                        <td>
                                            @if ($transporte->estado)
                                                <span class="shadow-none badge outline-badge-success">Activo</span>
                                            @else
                                                <span class=" shadow-none badge outline-badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1"
                                                    style="will-change: transform;">
                                                    @if ($transporte->estado)
                                                        <a wire:click="Edit({{ $transporte->idTransporte }})"
                                                            class="dropdown-item" href="javascript:void(0);">Editar</a>
                                                        <a onclick="Confirm('{{ $transporte->idTransporte }}')"
                                                            class="dropdown-item" href="javascript:void(0);">Dar de
                                                            Baja</a>
                                                    @else
                                                        <a wire:click="activeState({{ $transporte->idTransporte }})"
                                                            class="dropdown-item" href="javascript:void(0);">
                                                            <label
                                                                class="new-control new-checkbox checkbox-outline-warning">
                                                                <input type="checkbox" class="new-control-input"
                                                                    checked="">
                                                                <span class="new-control-indicator"></span> Activar
                                                            </label></a>
                                                    @endif
                                                </div>
                                            </div>




                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="7"> No se encontraron similitudes</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $transportes->links() }}
                </div>
            </div>

            @include('Livewire.Transporte.form')
        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(document.getElementById('date1'));
            flatpickr(document.getElementById('date2'));
            window.livewire.on('show-modal', message => {
                $('#exampleModal').modal('show');
            });
            window.livewire.on('transporte-added', message => {
                $('#exampleModal').modal('hide');
                showMessage(message);
            });
            window.livewire.on('transporte-updated', message => {
                $('#exampleModal').modal('hide');
                showMessage(message);
            });
        });

        function Confirm(id) {
            swal({
                title: 'CONFIRMAR',
                type: 'warning',
                text: "Estás seguro de dar de baja el vehìculo!",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: '#3b3f5c',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#fff',
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteRow', id);
                    swal(
                        'Eliminado!',
                        'El registro ha sido eliminado.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
