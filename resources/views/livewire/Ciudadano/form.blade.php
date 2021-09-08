<!-- Modal -->
<div wire:ignore.self class="modal fade" id="ciudadanoModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">👤 {{ $title ? 'Editar Ciudadano' : 'Nuevo Ciudadano' }}
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
                    <div class="form-group col-md-6">
                        <label for="name">Nombres</label>
                        <input wire:model.defer="nombre" type="text" class="form-control form-control-sm" id="name"
                            placeholder="Ingrese nombres">
                        @error('nombre')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName1">Apellido Paterno</label>
                        <input wire:model.defer="aPaterno" type="text" class="form-control form-control-sm"
                            id="lastName1" placeholder="Ingrese primer apellido">
                        @error('aPaterno')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="lastName2">Apellido Materno</label>
                        <input wire:model.defer="aMaterno" type="text" class="form-control form-control-sm"
                            id="lastName2" placeholder="Ingrese segundo apellido">
                        @error('aMaterno')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dni">Nº Documento</label>
                        <input wire:model.defer="dni" type="text" class="form-control form-control-sm" id="dni"
                            placeholder="Ingrese nº documento"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                            maxlength="8">
                        @error('dni')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="basicFlatpickr">Fecha de Nacimiento</label>

                        <input wire:model.defer="fNacimiento" id="basicFlatpickr"
                            class="form-control flatpickr flatpickr-input" type="text" placeholder="YYYY-MM-DD"
                            readonly="readonly">
                        @error('fNacimiento')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo Electrónico</label>
                        <input wire:model.defer="email" type="text" class="form-control form-control-sm" id="email"
                            placeholder="Ingrese email">
                        @error('email')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telephone">Telefono</label>
                        <input wire:model.defer="telefono" type="text" class="form-control form-control-sm"
                            id="telephone" placeholder="Telefono" maxlength="20">
                        @error('telefono')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gender">Género</label>
                        <select wire:model="genero" id="gender" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option Value="FEMENINO">FEMENINO</option>
                        </select>
                        @error('genero')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="depa">Departamento</label>
                        <select wire:model="SelectedDepa" id="depa" class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @foreach ($departamentos as $depa)
                                <option value="{{ $depa->idDepa }}">{{ $depa->departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="provincia">Provincias</label>
                        <select wire:model="SelectedProv" id="provincia" {{ $provincias ? '' : 'disabled' }}
                            class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @if (!is_null($provincias))
                                @foreach ($provincias as $prov)
                                    <option value="{{ $prov->idProvincia }}">{{ $prov->provincia }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dist">Distrito</label>
                        <select wire:model.defer="SelectedDist" id="dist" {{ $distritos ? '' : 'disabled' }}
                            class="form-control form-control-sm">
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Dirección</label>
                        <textarea wire:model="direccion" class="form-control form-control-sm" id="address"
                            placeholder="1234 Main St" rows="2"></textarea>
                        @error('direccion')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="reference">Referencia</label>
                        <textarea wire:model="referencia" class="form-control form-control-sm" id="reference"
                            placeholder="Apartment, studio, or floor" rows="2"></textarea>
                        @error('referencia')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="nivel">Nivel de Estudios</label>
                        <select wire:model="idNivel" id="nivel" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->idNivel }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                        @error('idNivel')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="seguro">Seguro</label>
                        <select wire:model="seguro" id="seguro" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="ESSALUD">ESSALUD</option>
                            <option Value="SIS">SIS</option>
                            <option Value="OTROS">OTROS</option>
                        </select>
                        @error('seguro')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="resetUI()" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
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
