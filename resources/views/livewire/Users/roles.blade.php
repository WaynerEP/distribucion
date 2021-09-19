@section('titlePage')
    <h3>Roles</h3>
@endsection

<div class="row layout-top-spacing">
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row p-3">
                    <div class="col-md-4 col-8">
                        <div class="search-input-group-style input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                            </div>
                            <input type="text" wire:model="search" class="form-control"
                                placeholder="Buscar por nombre..." aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-8 col-4 text-right align-items-center my-auto">
                        <button class="btn btn-primary" wire:click="resetUI" data-toggle="modal"
                            data-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus-square">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg> Nuevo Rol</button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-condensed mb-4">
                        <caption><span class="badge badge-info">Lista de todos los roles del Sistema</span></caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>CREACIÓN</th>
                                <th>PERMISOS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($roles->isNotEmpty())
                                @foreach ($roles as $r)
                                    <tr>
                                        <td>{{ $r->id }}</td>
                                        <td>
                                            {{ $r->name }}
                                        </td>
                                        <td>📆 {{ $r->created_at }}</td>
                                        <td>
                                            <div class="row">
                                                @if (count($r->permissions) > 0)
                                                    @foreach ($r->permissions as $p)
                                                        <div class="col-md-2 col-12 py-0 pl-3 mb-2 mr-2">
                                                            <span class="badge outline-badge-primary"> {{ $p->name }} </span>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="badge outline-badge-warning"> Sin permisos!! 🙁</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a wire:click="edit({{ $r->id }})" href="javascript:void(0);"
                                                        class="bs-tooltip" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Editar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-edit-2 text-success">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a></li>
                                                <li>
                                                    <a onclick="Confirm('{{ $r->id }}')"
                                                        href="javascript:void(0);" class="bs-tooltip"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Eliminar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-danger">
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
                    {{ $roles->links() }}
                </div>
            </div>
            @include('Livewire.Users.modalRoles')
        </div>
    </div>
</div>


@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            window.livewire.on('role-stored', message => {
                $('#exampleModal').modal('hide');
                showMessage(message);
            });

            window.livewire.on('show-modal', message => {
                $('#exampleModal').modal('show');
            });

            window.livewire.on('role-updated', message => {
                $('#exampleModal').modal('hide');
                showMessage(message);
            });

            window.livewire.on('role-destroyed', message => {
                swal(
                    message == 1 ? 'Eliminado!' :
                    'Error!',
                    message == 1 ? 'El rol ha sido eliminado!!' :
                    'El rol no puede ser eliminado por que tiene usuarios asignados',
                    message == 1 ? 'success' : 'error',
                )
            });
        });

        function Confirm(id) {
            swal({
                title: 'CONFIRMAR',
                type: 'warning',
                text: "Estás seguro de eliminar este rol!",
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
