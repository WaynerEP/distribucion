@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widgets/modules-widgets.css') }}">
@endsection

@section('titlePage')
    <h3>Cambiar Estado</h3>
@endsection

<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Marcar pedidos como entregados</h5>
            </div>

            <div class="
                    widget-content">
                    <div class="table-responsive">
                        <table class="table table-scroll">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">Pedido</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">Fecha del Pedido</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">Cliente</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">Dni Cliente</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Marcar</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>
                                            <div class="td-content product-name">
                                                @if ($d->image)
                                                    <img src="{{ asset('storage/entregas/' . $d->image) }}"
                                                        loading="lazy" alt="{{ $d->nombre }}">
                                                @else
                                                    <img src="{{ asset('assets/img/90x90.jpg') }}" loading="lazy"
                                                        alt="product">
                                                @endif
                                                <div class="align-self-center">
                                                    <p class="prd-name">{{ $d->nDocumento }}</p>
                                                    <p class="prd-category text-primary">Pedido
                                                        {{ str_pad($d->idPedido, 4, '0', STR_PAD_LEFT) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span
                                                    class="pricing">{{ $d->fecha }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span
                                                    class="discount-pricing">{{ strtoupper($d->cliente) }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content">{{ $d->dni }}</div>
                                        </td>
                                        <td class="td-content">
                                            @if ($d->estadoPedido)
                                                <div class="td-content"><span class="badge badge-success">Entregado
                                                        al cliente</span></div>
                                            @else
                                                <div class="td-content"><a
                                                        wire:click="openModal({{ $d->idPedido }},{{ $d->idDistribucion }},{{ $d->idRepartidor }})"
                                                        href="javascript:void(0);" class="text-primary"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-chevrons-right">
                                                            <polyline points="13 17 18 12 13 7"></polyline>
                                                            <polyline points="6 17 11 12 6 7"></polyline>
                                                        </svg> Marcar entregado</a></div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

            @include('Livewire.Entregados.modalEntregados')
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#ProductModal').modal('show');
            });
            window.livewire.on('product-updated', msg => {
                $('#ProductModal').modal('hide');
                showMessage(msg);
            });
        });
    </script>
@endsection
