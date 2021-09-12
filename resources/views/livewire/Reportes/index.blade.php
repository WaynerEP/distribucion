@section('titlePage')
    <h3>Reportes</h3>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css">
@endsection
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="doc-container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="invoice-content">
                        <div class="invoice-detail-body">
                            <div class="invoice-detail-header">
                                <div class="row justify-content-between">
                                    <div class="col-xl-12 invoice-address-company">
                                        <div class="invoice-address-company-fields">
                                            <div class="form-group row">
                                                <label for="inputState">State</label>
                                                <select id="inputState" wire:model="empleado" class="form-control">
                                                    <option value="">Todos</option>
                                                    @foreach ($empleados as $empleado)
                                                        <option value="{{ $empleado->idEmpleado }}">
                                                            {{ $empleado->nombre }}</option> {{ $empleado->nombre }}
                                                        {{ $empleado->aPaterno }} {{ $empleado->aMaterno }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company-email" class="my-2">TIPO DE
                                                    REPORTE</label>
                                                <select id="tipoR" wire:model="tipoReporte" class="form-control">
                                                    <option value="1">Ventas del dia</option>
                                                    <option value="2">Ventas por Fecha</option>

                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date1" class="my-2">DESDE:</label>
                                                <input type="text" class="form-control form-control-sm flatpickr"
                                                    id="date1" placeholder="YYYY-MM-DD"
                                                    {{ $tipoReporte == 2 ? 'disabled' : '' }}>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date2" class="my-3">HASTA</label>
                                                <input type="text" class="form-control form-control-sm flatpickr"
                                                    id="date2" placeholder="YYYY--MM-DD"
                                                    {{ $tipoReporte == 2 ? 'disabled' : '' }}>
                                            </div>
                                            <div class="invoice-actions-btn">
                                                <div class="invoice-action-btn">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-4" wire:click=resetAll()>
                                                            <a href="javacript:0;"
                                                                class="btn btn-primary btn-send">CONSULTAR</a>
                                                        </div>

                                                        <div class="col-xl-12 col-md-4">
                                                            <a {{ count($data) < 1 ? 'disabled' : '' }}
                                                                href="  {{ url('/report/pdf/' . $empleado . '/' . $tipoReporte . '/' . $date1 . '/' . $date2) }} "
                                                                class="btn btn-dark btn-preview" target="_blank">GENERAR
                                                                PDF</a>
                                                        </div>
                                                        <div class="col-xl-12 col-md-4">
                                                            <a {{ count($data) < 1 ? 'disabled' : '' }} href=""
                                                                class="btn btn-success btn-download"
                                                                target="_blank">GENERAR EXCEL</a>
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

                <div class="col-xl-8">
                    <div class="invoice-actions">
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>TOTAL</th>
                                            <th>EMPLEADO</th>
                                            <th class="">FECHA</th>
                                            <th>ESTADO</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if (count($data) > 0)
                                       @foreach ($data as $d)
                                       <tr>
                                           <td class="
                                                text-center">{{ $d->idPedido }}</td>
                                            <td class="text-primary">S/.{{ number_format($d->total, 2) }}</td>
                                            <td>{{ $d->empleado }}</td>
                                            <td>{{ $d->fecha }}</td>
                                            <td class="">
                                               @switch($d->estadoPedido)
                                               @case(0)
                                                   <span class="
                                                badge outline-badge-danger"> Cancelado </span>
                                                @break
                                                @case(1)
                                                    <span class="badge outline-badge-primary"> Confirmado </span>
                                                @break
                                                @case(2)
                                                    <span class="badge outline-badge-info"> Preparando Entrega
                                                    </span>
                                                @break
                                                @case(3)
                                                    <span class="badge outline-badge-warning"> Pedido en Reparto
                                                    </span>
                                                @break
                                                @default
                                                    <span class="badge outline-badge-success"> Pedido Entregado </span>
                                            @endswitch
                                        </td>
                                        <td class="text-center"><button
                                                class="btn btn-primary btn-sm">View</button> </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="7"> Sin resultados!!</td>
                                    </tr>
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(document.getElementById('date1'));
        flatpickr(document.getElementById('date2'));
        // window.livewire.on('errors', message => {
        //     errorMessage(message);
        // });
    });
</script>
@endsection
