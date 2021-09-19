<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ $title ? 'Editar Rol' : ' Nuevo Rol' }}
                </h5>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <label for="name">Nombre del Rol</label>

                <div class="input-group mb-4">
                    <input wire:model.defer="name" id="name" class="form-control" type="text" placeholder="Ingrese rol"
                        aria-label="notification" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg></span>
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="fRegistro">Permisos</label>
                        <div class="row mb-2">
                            <div class="n-chk col-md-4 col-6">
                                <label class="new-control new-radio square-radio radio-success text-success">
                                    <input type="radio" wire:click="asignarAllPermissions()"
                                        {{ !$pers && $title ? 'checked' : '' }} class="new-control-input"
                                        name="custom-radio-3">
                                    <span class="new-control-indicator"></span>Asignar Todos
                                </label>
                            </div>
                            <div class="n-chk col-md-4 col-6">
                                <label class="new-control new-radio square-radio radio-success text-success">
                                    <input type="radio" wire:click="personalizarPermisos()" class="new-control-input"
                                        name="custom-radio-3" {{ $pers ? 'checked' : '' }}>
                                    <span class="new-control-indicator"></span>Personalizado
                                </label>
                            </div>
                        </div>
                        @if ($showPermisos)
                            <div class="row">
                                @if ($title || $pers)
                                    @foreach ($permissions as $p)
                                        @foreach ($roleWithPermission->permissions as $pe)
                                            @if ($pe->id == $p->id)
                                                <div class="n-chk col-2">
                                                    <label class="new-control new-checkbox checkbox-outline-success">
                                                        <input type="checkbox" checked
                                                            wire:click="addPermission({{ $p->id }})"
                                                            class="new-control-input">

                                                        <span class="new-control-indicator"></span>{{ $p->name }}
                                                    </label>
                                                </div>
                                            @break
                                        @endif
                                        @if ($loop->last)
                                            <div class="n-chk col-2">
                                                <label class="new-control new-checkbox checkbox-outline-success">
                                                    <input type="checkbox"
                                                        wire:click="addPermission({{ $p->id }})"
                                                        class="new-control-input">

                                                    <span class="new-control-indicator"></span>{{ $p->name }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                @foreach ($permissions as $p)
                                    <div class="n-chk col-2">
                                        <label class="new-control new-checkbox checkbox-outline-success">
                                            <input type="checkbox"
                                                wire:click="addPermission({{ $p->id }})"
                                                class="new-control-input">
                                            <span class="new-control-indicator"></span>{{ $p->name }}
                                        </label>
                                    </div>
                                @endforeach
                        @endif
                    </div>
                    @endif
                </div>
                @error('permisos')
                    <div class="invalid-feedback d-block" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn" wire:click="resetUI" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                Cancelar</button>
            @if ($title)
                <button type="button" wire:click="update()" class="btn btn-info">
                    <span wire:loading wire:target="update"
                        class="spinner-border text-white mr-2 align-self-center loader-sm ">Loading...</span>
                    Actualizar</button>
            @else

                <button type="button" wire:click="store()" class="btn btn-primary">
                    <svg wire:loading wire:target="store" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-loader spin mr-2">
                        <line x1="12" y1="2" x2="12" y2="6"></line>
                        <line x1="12" y1="18" x2="12" y2="22"></line>
                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                        <line x1="2" y1="12" x2="6" y2="12"></line>
                        <line x1="18" y1="12" x2="22" y2="12"></line>
                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                    </svg> Guardar</button>
            @endif
        </div>

        <div wire:loading wire:target="personalizarPermisos" class="blockUI blockMsg blockElement"
            style="z-index: 1011; position: absolute; padding: 0px; margin: 0px; width: 30%; top: 194px; left: 380px; text-align: center; color: rgb(0, 0, 0); border: 0px; background-color: transparent;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-loader spin">
                <line x1="12" y1="2" x2="12" y2="6"></line>
                <line x1="12" y1="18" x2="12" y2="22"></line>
                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                <line x1="2" y1="12" x2="6" y2="12"></line>
                <line x1="18" y1="12" x2="22" y2="12"></line>
                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
            </svg>
        </div>

    </div>
</div>
</div>
</div>
