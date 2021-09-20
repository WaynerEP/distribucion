<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ $title ? '🙎‍♂️ Editar Usuario' : ' 🙎‍♂️ Nuevo Usuario' }}
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
                <div class="form-row mb-4">
                    @if (!$title)
                        <div class="form-group col-md-12">
                            <label for="inputState">Empleados</label>
                            <select id="inputState" wire:model="Empleado" class="form-control">
                                <option selected>Seleccione...</option>
                                @foreach ($empleados as $e)
                                    <option value="{{ $e->idEmpleado }}">👨‍💼 - {{ $e->ciudadano->nombre }}
                                        {{ $e->ciudadano->aPaterno }} {{ $e->ciudadano->aMaterno }} -
                                        {{ $e->dni }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group col-md-6">
                        <label for="name">Nombre de Usuario</label>
                        <input wire:model.defer="name" id="name" class="form-control" type="text"
                            placeholder="Enter username">
                        @error('name')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Correo Corporativo</label>
                        <input wire:model.defer="email" id="email" class="form-control"
                            {{ $title ? 'disabled' : '' }} type="text" placeholder="Enter Email">
                        @error('email')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Estado</label>
                        <select id="role" wire:model="status" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="1">Activo</option>
                            <option value="0">Bloqueado</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fRegistro">Rol</label>
                        <select id="role" wire:model="role" class="form-control">
                            <option value="">Seleccione...</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn" wire:click="resetUI" data-dismiss="modal"><i
                        class="flaticon-cancel-12"></i>
                    Cancelar</button>
                @if ($title)
                    <button type="button" wire:click="update()" class="btn btn-info">
                        <span wire:loading wire:target="update"
                            class="spinner-border text-white mr-2 align-self-center loader-sm ">Loading...</span>
                        Actualizar</button>
                @else

                    <button type="button" wire:click="store()" class="btn btn-primary">
                        <svg wire:loading wire:target="store" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2">
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
        </div>
    </div>
</div>