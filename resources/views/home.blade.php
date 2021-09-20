@extends('layouts.app')
@section('titlePage')
    <h3>Dashboard</h3>
@endsection
@section('styles')
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div id="chartMixed" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Ingresos por categorias</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-bar" class="" style=" min-height: 365px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Top Mejores Clientes</h5>
            </div>

            <div class=" widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Cliente</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Telefono</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Email</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Pedidos</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caseritos as $c)
                                        <tr>
                                            <td>
                                                <div class="td-content customer-name"><span>{{ $c->nombre }}</span></div>
                                            </td>
                                            <td>
                                                <div class="td-content product-brand text-primary">+51 {{ $c->telefono }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content product-invoice">{{ $c->email }}</div>
                                            </td>

                                            <td>
                                                <div
                                                    class="
                                                    td-content">
                                                    <span class="badge outline-badge-success">{{ $c->cantidad }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-three">

                <div class="widget-heading">
                    <h5 class="">Top Productos</h5>
            </div>

            <div class=" widget-content">
                        <div class="table-responsive">
                            <table class="table table-scroll">
                                <thead>
                                    <tr>

                                        <th>
                                            <div class="th-content text-center">Producto</div>
                                        </th>

                                        <th>
                                            <div class="th-content th-heading">Price</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Categoria</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $p)
                                        <tr>
                                            <td>
                                                <div class="td-content product-name">
                                                    @if ($p->image)
                                                        <img src="{{ asset('storage/products/' . $p->image) }}"
                                                            alt="product">
                                                    @else
                                                        <img src="{{ asset('assets/img/90x90.jpg') }}" alt="product">
                                                    @endif
                                                    <div class="align-self-center">
                                                        <p class="prd-name">{{ $p->nombre }}</p>
                                                        <p class="prd-category text-primary">{{ $p->codigo }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="td-content"><span
                                                        class="discount-pricing">s/.{{ number_format($p->precio, 2) }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content"><span
                                                        class="discount-pricing">{{ $p->categoria }}</span></div>
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
@endsection
@section('scripts')
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <script>
        var data = @JSON($pedidos);
        console.log(data[0].categoria);
        window.onload = showMessage();

        function showMessage() {
            Snackbar.show({
                text: 'Bienvenido al Sistema!',
                pos: 'bottom-right',
                actionText: 'Cerrar',
                actionTextColor: '#fff',
                backgroundColor: '#4361ee'
            });
        }

        var sBar = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: true
            },
            series: [{
                data: [data[0].monto, data[1].monto, data[2].monto, data[3].monto, data[4].monto, data[5].monto, data[6].monto, data[7].monto, data[8].monto, data[9].monto]
            }],
            xaxis: {
                categories: [data[0].categoria, data[1].categoria, data[2].categoria, data[3].categoria, data[4].categoria, data[5].categoria, data[6].categoria, data[7].categoria, data[8].categoria, data[9].categoria],
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#s-bar"),
            sBar
        );

        chart.render();
    </script>

@endsection
