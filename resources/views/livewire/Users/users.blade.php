@section('titlePage')
    <h3>Usuarios</h3>
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
                            <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus mr-2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>Nuevo Usuario</button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-condensed mb-4">
                        <caption><span class="badge badge-success">Lista de todos los Usuarios</span></caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PERFIL</th>
                                <th>EMAIL CORPORATIVO</th>
                                <th>DNI</th>
                                <th>ESTADO</th>
                                <th>ROL(ES)</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isNotEmpty())
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->idUsuario }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    @if ($u->photo_profile)
                                                        <img alt="avatar" class="img-fluid rounded" loading="lazy"
                                                            src="{{ asset('storage/profile/' . $u->photo_profile) }}">
                                                    @else
                                                        <img alt="avatar" class="img-fluid rounded" loading="lazy"
                                                            src="{{ asset('assets/img/90x90.jpg') }}">
                                                    @endif
                                                </div>
                                                <p class="align-self-center mb-0 text-primary">{{ $u->name }}</p>
                                            </div>
                                        </td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->dniCiudadano }}</td>
                                        <td>
                                            @switch ($u->estado)
                                                @case(0)
                                                    <span class="badge badge-danger"> Bloqueado </span>
                                                @break
                                                @case(1)
                                                    <span class="badge badge-primary"> Activo </span>
                                                @break
                                                @default
                                                    <span class="badge badge-default"> Sin rol </span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @foreach ($u->roles as $r)
                                                <span class="badge outline-badge-success"> {{ $r->name }} </span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a wire:click="edit({{ $u->idUsuario }})"
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
                                                <li>
                                                    @if ($u->estado)
                                                        <a onclick="Confirm('{{ $u->idUsuario }}')"
                                                            href="javascript:void(0);" class="bs-tooltip"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Eliminar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x-circle text-danger">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                                            </svg>
                                                        </a>
                                                    @endif
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
                    {{ $users->links() }}
                </div>
            </div>
            @include('Livewire.Users.modalUsers')
        </div>
    </div>
</div>


@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            window.livewire.on('user-stored', message => {
                $('#exampleModal').modal('hide');
                showMessage(message);
            });

            window.livewire.on('show-modal', message => {
                $('#exampleModal').modal('show');
            });

            window.livewire.on('user-updated', message => {
                $('#exampleModal').modal('hide');
                showMessage(message);
            });
        });

        function Confirm(id) {
            swal({
                title: 'CONFIRMAR',
                type: 'warning',
                text: "Estás seguro de bloquear este usuario!",
                showCancelButton: true,
                confirmButtonText: 'Bloquear',
                confirmButtonColor: '#3b3f5c',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#fff',
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteRow', id);
                    window.livewire.on('user-destroyed', message => {
                        swal(
                            'Bloqueado!',
                            message,
                            'success'
                        )
                    });
                }
            })
        }
    </script>
@endsection
