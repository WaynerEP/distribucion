@section('titlePage')
    <h3>Productos</h3>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
@endsection

<div class="col-lg-12 col-12 layout-spacing">
    <div class="row">
        {{-- <div id="navSection" data-spy="affix" class="nav  sidenav">
            <div class="sidenav-content">
                @foreach ($categories as $category)
                    <a href="javascript:void(0);" wire:click="filterByCategory({{ $category->idCategoriaProducto }})" class="nav-link">{{ $category->nombre }}</a>
                @endforeach
                <a href="javascript:void(0);" wire:click="filterByCategory('')" class="nav-link">Todas las Categorias</a>
            </div>
        </div> --}}
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
                    <button class="btn btn-primary" wire:click="resetUI" data-toggle="modal"
                        data-target="#ProductModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Agregar</button>
                </div>
            </div>

            @if ($productos->count() > 0)
                <div class="row grid">
                    @foreach ($productos as $product)
                        <div class="col-md-2 col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <img src="{{ asset('storage/products/' . $product->image) }}" class="w-100 h-100">

                                    <p>{{ $product->nombre }}</p>
                                    <small>{{ $product->categoria }}</small>
                                    <p class="text-sm text-primary">Stock: {{ $product->cantidad }}</p>
                                    <div class="my-3">
                                        <p class="text-danger"><b>S/. {{ $product->precio }}</b></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-dark btn-sm">
                                            Add
                                        </button>
                                        <div class="dropdown d-inline-block">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                <a wire:click="Edit({{ $product->idProducto }})"" class="
                                                    note-personal label-group-item label-personal dropdown-item
                                                    position-relative g-dot-personal" href="javascript:void(0);">
                                                    Editar</a>
                                                <a onclick="Confirm('{{ $product->idProducto }}')"
                                                    class="note-important label-group-item label-important dropdown-item position-relative g-dot-important"
                                                    href="javascript:void(0);"> Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center text-danger my-3 py-3">
                        No se encontraron registros!! Lo siento Beba!!
                    </div>
                </div>
            @endif
            <div>
                {{ $productos->links() }}
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
            });
            window.livewire.on('product-updated', msg => {
                $('#ProductModal').modal('hide');
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
