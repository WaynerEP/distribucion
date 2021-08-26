<!-- Modal -->
<div wire:ignore.self class="modal fade" id="ProductModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title ? 'Editar Producto' : 'Nuevo Producto' }}
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
                    <div class="form-group col-md-3">
                        <label for="code">Código</label>
                        <input wire:model.defer="codigo" type="text" class="form-control form-control-sm" id="code"
                            placeholder="Código">
                        @error('codigo')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-9">
                        <label for="description">Descripción</label>
                        <input wire:model.defer="nombre" type="text" class="form-control form-control-sm"
                            id="description" placeholder="Nombre">
                        @error('nombre')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category">Categoría</label>
                        <select wire:model.defer="idCategoriaProducto" id="category"
                            class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->idCategoriaProducto }}">{{ $category->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('idCategoriaProducto')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stock">Almacén</label>
                        <select wire:model.defer="idAlmacen" id="category" class="form-control form-control-sm">
                            <option value="">Seleccione...</option>
                            @foreach ($almacenes as $alm)
                                <option value="{{ $alm->idAlmacen }}">{{ $alm->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('idAlmacen')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input wire:model.defer="precio" type="text" class="form-control" id="price"
                                aria-label="Amount (to the nearest dollar)" placeholder="2.50">

                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('precio')
                                <div class="invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stock">Stock</label>
                        <input wire:model.defer="cantidad" type="number" min="1" pattern="^[0-9]+"
                            class="form-control form-control-sm" id="stock" placeholder="Stock">
                        @error('cantidad')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="image" class="col-md-2 col-12 col-form-label">
                        Imagen:
                    </label>
                    <div class="col-md-6 col-12">
                        <div class="upload">
                            <div class="dropify-wrapper">
                                <div class="dropify-message">
                                    <span class="file-icon"></span>
                                    <p>Click to Upload Picture</p>
                                </div>
                                <div wire:loading wire:target="image" class="dropify-loader"></div>
                                <input type="file" wire:model.defer="image" class="dropify" data-max-file-size="2M">
                                @if ($image || $photoProduct)
                                    <div class="dropify-preview" style="display: block;">
                                        <span class="dropify-render">
                                            @if ($image)
                                                <img src="{{ $image->temporaryUrl() }}">
                                            @else
                                                <img src="{{ asset('storage/products/' . $photoProduct) }}">
                                            @endif
                                        </span>
                                        <div class="dropify-infos">
                                            <div class="dropify-infos-inner">
                                                <p class="dropify-filename">
                                                    <span class="file-icon"></span>
                                                    <span class="dropify-filename-inner">
                                                        image.jpg
                                                    </span>
                                                </p>
                                                <p class="dropify-infos-message">Upload or Drag, Drop</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
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
