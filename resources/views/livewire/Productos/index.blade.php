@section('titlePage')
    <h3>Productos</h3>
@endsection

<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="row">
            <div class="col-lg-12 layout-spacing">
                <div class="row p-3">
                    <div class="col-md-4 col-8">
                        <div class="full-search search-form-overlay input-focused">
                            <form class="form-inline form-inline search mt-lg-0" role="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <div class="search-bar">
                                    <input type="text" wire:model="search"
                                        class="form-control form-control-sm search-form-control ml-lg-auto"
                                        placeholder="Buscar por descripción...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 col-4 text-right align-items-center my-auto">
                        <div class="btn-group dropleft mr-2" role="group">
                            <button id="btnDropLeft" type="button" class="btn btn-danger dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg> Reportes</button>
                            <div class="dropdown-menu" aria-labelledby="btnDropLeft" style="will-change: transform;">
                                <a href="javascript:void(0);" class="dropdown-item">Formato PDF</a>
                                <a href="javascript:void(0);" class="dropdown-item">Formato Excel</a>
                            </div>
                        </div>
                        <button class="btn btn-primary" wire:click="resetUI" data-toggle="modal"
                            data-target="#ProductModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Agregar</button>
                    </div>
                </div>
                <div class="statbox widget box box-shadow">
                    {{--  <div class="widget-header">
                        <div class="row px-3 pt-3">
                            <div class="col-12">
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-lg-1 col-2 col-form-label align-items-center d-flex">
                                        <span class="badge badge-primary">FILTRAR:</span>
                                    </label>
                                    <div class="col-lg-4 col-10">
                                        <select wire:model="filter" id="inputState"
                                            class="form-control form-control-sm">
                                            <option value="">Todos</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->idCategoriaProducto }}">
                                                    {{ $category->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Categoria</th>
                                        <th>Stock</th>
                                        <th>Precio</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($productos->isNotEmpty())
                                        @foreach ($productos as $product)
                                            <tr>
                                                <td class="text-primary">{{ $product->idProducto }}</td>
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
                                                        <p class="align-self-center mb-0">{{ $product->nombre }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $product->categoria }}</td>
                                                <td>{{ $product->cantidad }}</td>
                                                <td>S/. {{ number_format($product->precio,2) }}</td>
                                                <td class=" text-center">
                                                    <ul class="table-controls">
                                                        <li><a wire:click="Edit('{{ $product->idProducto }}')"
                                                                class="bs-tooltip" href="javascript:void(0);"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Edit"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit-2 text-success">
                                                                    <path
                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                    </path>
                                                                </svg></a></li>
                                                        <li><a onclick="Confirm('{{ $product->idProducto }}')"
                                                                class="bs-tooltip" href="javascript:void(0);"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2 text-danger">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path
                                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                    </path>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                </svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="6"> No se encontraron similitudes</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>

                        </div>
                        <div>
                            {{ $productos->links() }}
                        </div>
                    </div>

                </div>

            </div>

            @include('Livewire.Productos.form')
        </div>
    </div>
</div>


@section('scripts')
    <script src="plugins/dropify/dropify.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#ProductModal').modal('show');
            });
            window.livewire.on('product-added', msg => {
                $('#ProductModal').modal('hide');
                showMessage(msg);
            });
            window.livewire.on('product-updated', msg => {
                $('#ProductModal').modal('hide');
                showMessage(msg);
            });
        });

        function Confirm(id) {
            swal({
                title: 'CONFIRMAR',
                type: 'warning',
                text: "Estàs seguro de eliminar este registro!",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: '#3b3f5c',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#fff',
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteRow', id);
                    swal(
                        'Eliminado!',
                        'El registro ha sido eliminado.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
