<!-- Modal -->
<div wire:ignore.self class="modal fade" id="productsModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="search-input-group-style input-group mb-3">
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
                                placeholder="Buscar por descripción..." aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head"
                        style="width: 100%;">
                        <thead>
                            <tr>

                                <th>CÓDIGO</th>
                                <th>DESCRIPCIÓN</th>
                                <th>PRECIO</th>
                                <th class="text-center">SELECCIONE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($allProducts) > 0)
                                @foreach ($allProducts as $product)
                                    <tr>

                                        <td>{{ $product->codigo }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="avatar avatar-sm mr-2">
                                                    @if ($product->image)
                                                        <img alt="{{ $product->nombre }}" loading="lazy"
                                                            class="rounded"
                                                            src="{{ asset('storage/products/' . $product->image) }}">
                                                    @else
                                                        <img src="{{ asset('assets/img/90x90.jpg') }}"
                                                            class="profile-img" alt="image" loading="lazy">
                                                    @endif
                                                </div>
                                                <p class="align-self-center mb-0 text-primary">
                                                    {{ strtoupper($product->nombre) }}</p>
                                            </div>
                                        </td>
                                        <td>S/.{{ number_format($product->precio, 2) }}</td>
                                        <td class="checkbox-column text-center">
                                            <a href="javascript:void(0);"
                                                wire:click="addProduct({{ $product->idProducto }},1)"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-check-square text-primary">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                    </path>
                                                </svg></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="4">Sin resultados!!
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $allProducts->links() }}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
        <div wire:loading wire:target="addProduct">
            <livewire:loader>
        </div>
    </div>
</div>
