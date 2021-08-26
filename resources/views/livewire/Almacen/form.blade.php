<!-- Modal -->
<div wire:ignore.self class="modal fade" id="AlmacenModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title ? 'Editar Almacén' : 'Nuevo Almacén' }}</h5>
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
                    <div class="form-group col-md-4">
                        <label for="code">Código</label>
                        <input wire:model="codigo" type="text" class="form-control form-control-sm" id="code"
                            placeholder="Código">
                        @error('codigo')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="description">Descripción</label>
                        <input wire:model="nombre" type="text" class="form-control form-control-sm" id="description"
                            placeholder="Nombre">
                        @error('nombre')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="address">Dirección</label>
                    <textarea wire:model="direccion" class="form-control form-control-sm" id="address"
                        placeholder="1234 Main St" rows="2"></textarea>
                    @error('direccion')
                        <div class="invalid-feedback d-block" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="reference">Referencia</label>
                    <textarea wire:model="referencia" class="form-control form-control-sm" id="reference"
                        placeholder="Apartment, studio, or floor" rows="2"></textarea>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="depa">Departamentos</label>
                        <select wire:model="SelectedDepa" id="depa" class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @foreach ($departamentos as $depa)
                                <option value="{{ $depa->idDepa }}">{{ $depa->departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="provincia">Provincias</label>
                        <select wire:model="SelectedProv" id="provincia" class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @if (!is_null($provincias))
                                @foreach ($provincias as $prov)
                                    <option value="{{ $prov->idProvincia }}">{{ $prov->provincia }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dist">Distritos</label>
                        <select wire:model="SelectedDist" id="dist" class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @if (!is_null($distritos))
                                @foreach ($distritos as $dist)
                                    <option value="{{ $dist->idDistrito }}">{{ $dist->distrito }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('SelectedDist')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" wire:click="resetUI" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    Cancelar</button>
                @if ($title)
                    <button type="button" wire:click="Update()" class="btn btn-info flex align-items-center">
                        <svg wire:loading wire:target="Update" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                        </svg> Actualizar</button>
                @else
                    <button type="button" wire:click="Store" class="btn btn-primary">
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
                        </svg> <span class="my-auto"> Guardar</span></button>
                @endif
            </div>
        </div>
    </div>
</div>
