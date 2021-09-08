<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">🚛 {{ $title ? 'Editar Vehículo' : 'Nuevo Vehículo' }}
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
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matricula">N° Matrícula</label>
                        <input wire:model.defer="matricula" type="text" class="form-control form-control-sm"
                            id="matricula" placeholder="Ingrese n° matricula">
                        @error('matricula')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="capacity">Capacidad (KG)</label>
                        <input wire:model.defer="capacidad" type="text" class="form-control form-control-sm"
                            id="capacity" placeholder="Ingrese capacidad">
                        @error('capacidad')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date1">Fecha Adquisicion</label>
                        <input wire:model.defer="fAdquisicion" type="text"
                            class="form-control flatpickr flatpickr-input" id="date1" placeholder="YYYY-MM-DD"
                            readonly="readonly">
                        @error('fAdquisicion')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="date2">Fecha Registro</label>
                        <input wire:model.defer="fVehiculo" id="date2" class="form-control flatpickr flatpickr-input"
                            type="text" placeholder="YYYY-MM-DD" readonly="readonly">
                        @error('fVehiculo')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="height">Altura (M)</label>
                        <input wire:model.defer="altura" type="number" class="form-control form-control-sm" id="height"
                            placeholder="Ingrese altura" min="1">
                        @error('altura')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="width">Ancho (M)</label>
                        <input wire:model.defer="ancho" type="number" class="form-control form-control-sm" id="widht"
                            placeholder="Ingrese ancho" min="1">
                        @error('ancho')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="capacity2">Capacidad de Combustible</label>
                        <input wire:model.defer="capacidadCombustible" type="text"
                            class="form-control form-control-sm" id="capacity2" placeholder="Ej. 10,20,etc" min="1">
                        @error('capacidadCombustible')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="resetUI()" class="btn" data-dismiss="modal"><i
                        class="flaticon-cancel-12"></i> Cancelar</button>
                @if ($title)
                    <button type="button" wire:click="Update()" class="btn btn-info">
                        <span wire:loading wire:target="Update"
                            class="spinner-border text-white mr-2 align-self-center loader-sm ">Loading...</span>
                        Actualizar</button>

                @else

                    <button type="button" wire:click="Store()" class="btn btn-primary">
                        <svg wire:loading wire:target="Store" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
