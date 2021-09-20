@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
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
                                        <div class="th-content th-heading">Fecha</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">Nro. Documento</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Cliente</div>
                                    </th>
                                    <th>
                                        <div class="th-content">Source</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>
                                            <div class="td-content product-name">
                                                <img src="{{ asset('assets/img/90x90.jpg') }}" alt="product">
                                                <div class="align-self-center">
                                                    <p class="prd-name">Headphone</p>
                                                    <p class="prd-category text-primary">Digital</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span class="pricing">$168.09</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span class="discount-pricing">$60.09</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content">170</div>
                                        </td>
                                        <td>
                                            {{-- <div class="td-content"><span class="badge badge-success">Entregado al cliente</span></div> --}}
                                            <div class="td-content"><a href="javascript:void(0);"
                                                    class="text-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-chevrons-right">
                                                        <polyline points="13 17 18 12 13 7"></polyline>
                                                        <polyline points="6 17 11 12 6 7"></polyline>
                                                    </svg> Marcar entregado</a></div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
