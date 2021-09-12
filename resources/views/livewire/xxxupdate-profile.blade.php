<div class="account-settings-container layout-top-spacing mb-5">
    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <div class="section general-info">
                        <div class="info">
                            <h6 class="">Información General</h6>
                            <div class=" row">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                            <div class="upload mt-4 pr-md-4">
                                                <div class="dropify-wrapper has-preview">
                                                    <input type="file" wire:model.defer="image" id="input-file-max-fs"
                                                        class="dropify"
                                                        data-default-file="assets/img/200x200.jpg"
                                                        data-max-file-size="2M">
                                                    <button type="button" class="dropify-clear">
                                                        <i class="flaticon-close-fill"></i>
                                                    </button>
                                                    <div class="dropify-preview" style="display: block;">
                                                        <span class="dropify-render">
                                                            @if ($image)
                                                                <img src="{{ $image->temporaryUrl() }}">
                                                            @elseif($photoProfile)
                                                                <img
                                                                    src="{{ asset('storage/profile/' . $photoProfile) }}">
                                                            @else
                                                                <img src="assets/img/200x200.jpg">
                                                            @endif
                                                        </span>
                                                        <div class="dropify-infos">
                                                            <div class="dropify-infos-inner">
                                                                <p class="dropify-filename"><span
                                                                        class="file-icon"></span> <span
                                                                        class="dropify-filename-inner">200x200</span>
                                                                </p>
                                                                <p class="dropify-infos-message">Upload or Drag n Drop
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                    Cargar imagen</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="lastName1">Apellido Paterno</label>
                                                            <input type="text" wire:model.defer="aPaterno"
                                                                class="form-control mb-4" readonly="readonly"
                                                                id="lastName1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="lastName2">Apellido Materno</label>
                                                            <input type="text" wire:model.defer="aMaterno"
                                                                class="form-control mb-4" readonly="readonly"
                                                                id="lastName2">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="names">Nombres</label>
                                                            <input type="text" wire:model.defer="nombre"
                                                                class="form-control mb-4" readonly="readonly"
                                                                id="names">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="gender">Sexo</label>
                                                            <select wire:model.defer="sexo" id="gender"
                                                                class="form-control">
                                                                <option value="">Seleccione</option>
                                                                <option value="M">MASCULINO</option>
                                                                <option Value="F">FEMENINO</option>
                                                            </select>
                                                            @error('genero')
                                                                <div class="invalid-feedback d-block" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="dni">Documento de Identidad</label>
                                                            <input type="text" wire:model.defer="dni"
                                                                class="form-control mb-4" id="dni" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="dateBorn">Fecha de Nacimiento</label>
                                                            <input type="text" wire:model.defer="fNacimiento"
                                                                class="form-control mb-4" id="dateBorn">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="address">Domicilio Actual</label>
                                                            <textarea wire:model="direccion"
                                                                class="form-control form-control-sm mb-4" id="address"
                                                                placeholder="1234 Main St" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="reference">Referencia</label>
                                                            <textarea wire:model="referencia"
                                                                class="form-control form-control-sm mb-4" id="reference"
                                                                placeholder="1234 Main St" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="telephono">Teléfono</label>
                                                            <input type="text" wire:model.defer="telefono"
                                                                class="form-control mb-4" id="telephono">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" wire:model.defer="email"
                                                                class="form-control mb-4" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="seguro">Seguro</label>
                                                            <select wire:model="seguro" id="seguro"
                                                                class="form-control">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="account-settings-footer">
    <button type="button" wire:click="updateProfile()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
            <path
                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
            </path>
        </svg> Guardar Cambios</button>
    <a href="user_profile" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-corner-up-left">
            <polyline points="9 14 4 9 9 4"></polyline>
            <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
        </svg> Volver</a>
</div>
</div>
