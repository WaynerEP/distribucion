@section('titlePage')
    <h3>Ciudadanos</h3>
@endsection
@section('styles')
    <link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css">
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
                                        placeholder="Buscar por nombres y apellidos...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 col-6 text-right align-items-center my-auto">
                        <button class="btn btn-primary" wire:click="resetUI" data-toggle="modal"
                            data-target="#ciudadanoModal">
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
                        <caption>Lissta de todos los ciudadanos</caption>
                        <thead class="table-primary">
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>N° Documento</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($ciudadanos->isNotEmpty())
                                @foreach ($ciudadanos as $ciudadano)
                                    <tr>
                                        <td class="text-primary">{{ $ciudadano->nombre }}</td>
                                        <td>{{ $ciudadano->aPaterno }} {{ $ciudadano->aMaterno }}</td>
                                        <td>{{ $ciudadano->dni }}</td>
                                        <td>{{ $ciudadano->email }}</td>
                                        <td class=""><span class=" shadow-none badge outline-badge-primary">
                                            {{ $ciudadano->telefono }}</span>
                                        </td>
                                        <td>{{ $ciudadano->direccion }}</td>
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
                                                    <a wire:click="Edit({{ $ciudadano->dni }})" class="dropdown-item"
                                                        href="javascript:void(0);">Editar</a>
                                                    <a onclick="Confirm('{{ $ciudadano->dni }}')"
                                                        class="dropdown-item" href="javascript:void(0);">Eliminar</a>
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
                    {{ $ciudadanos->links() }}
                </div>
            </div>

            @include('Livewire.Ciudadano.form')
        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(document.getElementById('basicFlatpickr'));
            window.livewire.on('show-modal', message => {
                $('#ciudadanoModal').modal('show');
            });
            window.livewire.on('ciudadano-added', message => {
                $('#ciudadanoModal').modal('hide');
                showMessage(message);
            });
            window.livewire.on('ciudadano-updated', message => {
                $('#ciudadanoModal').modal('hide');
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
