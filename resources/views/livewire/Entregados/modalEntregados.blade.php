<!-- Modal -->
<div wire:ignore.self class="modal fade" id="ProductModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Pedido
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

                <div class="form-group row mt-2">
                    <label for="image" class="col-md-3 col-12 col-form-label">
                        Imagen de Verificación:
                    </label>
                    <div class="col-md-6 col-12">
                        <div class="upload">
                            <div class="dropify-wrapper">
                                <div class="dropify-message">
                                    <span class="file-icon"></span>
                                    <p>Click to Upload Picture</p>
                                </div>
                                <div wire:loading wire:target="image" class="dropify-loader"></div>
                                <input type="file" wire:model.defer="image" class="dropify"
                                    data-max-file-size="2M" accept="image/png, .jpeg, .jpg, image/gif">
                                @if ($image)
                                    <div class="dropify-preview" style="display: block;">
                                        <span class="dropify-render">

                                            <img src="{{ $image->temporaryUrl() }}">

                                        </span>
                                        <div class="dropify-infos">
                                            <div class="dropify-infos-inner">
                                                <p class="dropify-infos-message">Upload or Drag, Drop</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @error('image')
                        <div class="invalid-feedback d-block" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nota">Nota</label>
                        <textarea wire:model="nota" class="form-control form-control-sm" id="nota"
                            placeholder="Enter a note..." rows="2"></textarea>
                        @error('nota')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="monto">Monto</label>
                        <input wire:model="monto" class="form-control form-control-sm" id="monto"
                            placeholder="Ingrese un monto..." />
                        @error('monto')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" wire:click="resetUI()" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" wire:click="store()" class="btn btn-primary">
                    <svg wire:loading wire:target="Store" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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

            </div>
        </div>
    </div>
</div>
