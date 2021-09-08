<!-- Modal -->
<div wire:ignore.self class="modal fade" id="zonaModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title ? 'Editar Zona' : 'Nueva Zona' }}
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
                    <div class="form-group col-md-6">
                        <label for="nombre">Descripción</label>
                        <input wire:model.defer="nombre" type="text" class="form-control form-control-sm" id="nombre"
                            placeholder="Ingrese zona">
                        @error('nombre')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fRegistro">Fecha</label>
                        <input wire:model.defer="fRegistro" id="basicFlatpickr" class="form-control flatpickr flatpickr-input"
                            type="text" placeholder="YYYY-MM-DD" readonly="readonly">
                        @error('fRegistro')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
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
                        <select wire:model="SelectedProv" id="provincia" class="form-control form-control-sm" {{ $provincias?'':'disabled' }}>
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
                        <select wire:model="SelectedDist" id="dist" class="form-control form-control-sm" {{ $distritos?'':'disabled' }}>
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
                <button class="btn" wire:click="resetUI" data-dismiss="modal"><i
                        class="flaticon-cancel-12"></i>
                    Cancelar</button>
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
