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
                                                <label for="inputState">EMPLEADO</label>
                                                <select id="inputState" wire:model="idempleado" class="form-control">
                                                    <option value="0">Todos</option>
                                                    @foreach ($empleados as $empleado)
                                                        <option value="{{ $empleado->idEmpleado }}">
                                                            {{ $empleado->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company-email" class="my-2">TIPO DE
                                                    REPORTE</label>
                                                <select id="tipoR" wire:model="tipoReporte" class="form-control">
                                                    <option value="0">Pedidos del dia</option>
                                                    <option value="1">Pedidos por Fecha</option>

                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date1" class="my-2">DESDE:</label>
                                                <input type="text" wire:model="date1"
                                                    class="form-control form-control-sm flatpickr"
                                                    {{ $tipoReporte ? '' : 'disabled' }} id="date01"
                                                    placeholder="YYYY-MM-DD">
                                            </div>
                                            <div class="form-group row">
                                                <label for="date2" class="my-3">HASTA</label>
                                                <input type="text" wire:model="date2"
                                                    class="form-control form-control-sm flatpickr"
                                                    {{ $tipoReporte ? '' : 'disabled' }} id="date02"
                                                    placeholder="YYYY--MM-DD">
                                            </div>
                                            <div class="invoice-actions-btn">
                                                <div class="invoice-action-btn">
                                                    <div class="row">
                                                        {{-- <div class="col-xl-12 col-md-4">
                                                            <a href="javascript:void(0);" wire:click="$refresh"
                                                                class=" btn btn-primary btn-send">CONSULTAR</a>
                                                        </div> --}}

                                                        <div class="col-xl-12 col-md-4">
                                                            <a href="  {{ url('/reportes/pdf/' . $idempleado . '/' . $tipoReporte . '/' . $date1 . '/' . $date2) }} "
                                                                class="btn btn-dark btn-preview {{ count($data) > 0 ? '' : 'disabled' }}"
                                                                target="_blank">GENERAR
                                                                PDF</a>
                                                        </div>
                                                        <div class="col-xl-12 col-md-4">
                                                            <a href="{{ url('/reportes/excel/' . $idempleado . '/' . $tipoReporte . '/' . $date1 . '/' . $date2) }}"
                                                                class="btn btn-success btn-download {{ count($data) > 0 ? '' : 'disabled' }}"
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
                            <div class="table-responsive bg-white" style="max-height: 600px; overflow: auto;">
                                <table class="table mb-4 bg-white">
                                    <thead class="sticky-top bg-white">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>TOTAL</th>
                                            <th>EMPLEADO</th>
                                            <th>FECHA</th>
                                            <th>ESTADO</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) > 0)
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td> {{ $d->idPedido }}</td>
                                                    <td class="text-primary">S/.{{ number_format($d->monto, 2) }}
                                                    </td>
                                                    <td>{{ $d->nombre }}</td>
                                                    <td>{{ $d->fecha }}</td>
                                                    <td class="">
                                               @if (!$d->estadoPedido)
                                                   <span class="
                                                        badge outline-badge-primary"> En proceso </span>
                                                    @else
                                                        <span class="badge outline-badge-success"> Pedido Entregado
                                                        </span>
                                            @endif
                                            </td>
                                            <td class="text-center"><button
                                                    wire:click="getDetails({{ $d->idPedido }})"
                                                    class="btn btn-primary btn-sm">View</button> </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="6"> Sin resultados!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                @include('Livewire.Reportes.details')

            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(document.getElementById('date01'));
            flatpickr(document.getElementById('date02'));
            window.livewire.on('show-modal', message => {
                $('#detailsModal').modal('show');
            });
            // window.livewire.on('errors', message => {
            //     errorMessage(message);
            // });
        });
    </script>
@endsection
