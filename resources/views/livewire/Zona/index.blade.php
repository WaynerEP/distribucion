@section('titlePage')
    <h3>Zonas</h3>
@endsection
<div class="row layout-top-spacing">
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row p-3">
                    <div class="col-md-4 col-8">
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
                                        placeholder="Buscar por descripción...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 col-4 text-right align-items-center my-auto">
                        <button class="btn btn-primary" wire:click="resetUI" data-toggle="modal"
                            data-target="#zonaModal">
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
                    <table class="table table-bordered table-hover table-condensed mb-4">
                        <caption><span class="badge badge-success">Lista de todos las zonas</span></caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Distrito</th>
                                <th>Fecha de Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($zonas->isNotEmpty())
                                @foreach ($zonas as $zona)
                                    <tr>
                                        <td>{{ $zona->idZona }}</td>
                                        <td>{{ $zona->nombre }}</td>
                                        <td>{{ $zona->distrito->distrito }}</td>
                                        <td>{{ $zona->fRegistro }}</td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a wire:click="Edit({{ $zona->idZona }})"
                                                        href="javascript:void(0);" class="bs-tooltip"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Editar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-check-circle text-primary">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </a></li>
                                                <li><a onclick="Confirm('{{ $zona->idZona }}')"
                                                        href="javascript:void(0);" class="bs-tooltip"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Eliminar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-x-circle text-danger">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                                        </svg>
                                                    </a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="6"> No se encontraron similitudes</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $zonas->links() }}
                </div>
            </div>

            @include('Livewire.Zona.form')
        </div>
    </div>
</div>


@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(document.getElementById('basicFlatpickr'));
            window.livewire.on('show-modal', message => {
                $('#zonaModal').modal('show');
            });
            window.livewire.on('zona-added', message => {
                $('#zonaModal').modal('hide');
                showMessage(message);
            });
            window.livewire.on('zona-updated', message => {
                $('#zonaModal').modal('hide');
                showMessage(message);
            });
        });

        function Confirm(id) {
            swal({
                title: 'CONFIRMAR',
                type: 'warning',
                text: "Estàs seguro de eliminar este registro!",
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
