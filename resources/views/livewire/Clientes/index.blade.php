@section('titlePage')
    <h3>Clientes</h3>
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
                            data-target="#clienteModal">
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
                    <table class="table table-bordered mb-4">
                        <caption>Lista de todos los clientes</caption>
                        <thead>
                            <tr class="table-dark">
                                <th>Id</th>
                                <th>Nombres y Apellidos</th>
                                <th>email</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($clientes->isNotEmpty())
                                @foreach ($clientes as $c)
                                    <tr>
                                        <td>{{ $c->idCliente }}</td>
                                        <td>{{ $c->nombre }} {{ $c->aPaterno }}
                                            {{ $c->aMaterno }}</td>
                                        <td>{{ $c->email }}</td>
                                        <td>{{ $c->direccion }}</td>
                                        <td class="text-center">
                                            @if ($c->estado)
                                                <span class="shadow-none badge badge-primary">Activo</span>
                                            @else
                                                <span class="shadow-none badge badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                        wire:click="edit({{ $c->idCliente }})" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-edit-2">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                        onclick="Confirm('{{ $c->idCliente }}')" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Delete"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="6"> No hay Resultados!! 🙁</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $clientes->links() }}
                </div>
            </div>

            @include('Livewire.Clientes.form')
        </div>
    </div>
</div>


@section('scripts')
    {{-- <script src="{{ asset('plugins/select2/select2.min.js') }}"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // var ss = $(".basic").select2({
            //     tags: true,
            //     dropdownParent: $('#clienteModal')
            // });

            window.livewire.on('show-modal', message => {
                $('#clienteModal').modal('show');
            });
            window.livewire.on('cliente-added', message => {
                $('#clienteModal').modal('hide');
                showMessage(message);
            });
            window.livewire.on('cliente-updated', message => {
                $('#clienteModal').modal('hide');
                showMessage(message);
            });
            window.livewire.on('cliente-destroyed', message => {
                swal(
                    'Eliminado!',
                    message,
                    'success'
                )
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
                }
            })
        }
    </script>
@endsection
