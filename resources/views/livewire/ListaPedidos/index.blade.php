@section('titlePage')
    <h3>Nueva Listas</h3>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/animate/animate.css') }}"> --}}
@endsection

<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="doc-container">
            <div class="row">
                <div class="col-xl-9">

                    <div class="invoice-content">

                        <div class="invoice-detail-body">

                            <div class="invoice-detail-title">

                                <div class="invoice-logo">
                                    <img alt="avatar" src="{{ asset('assets/img/logo.png') }}"
                                        class="img-fluid rounded w-75" />
                                </div>
                                <div class="invoice-title">
                                    <div class="form-group mb-4">
                                        <label for="number">N° Lista:</label>
                                        <input type="text"
                                            value="#{{ str_pad($nroLista->nro, 5, '0', STR_PAD_LEFT) }}"
                                            class="form-control form-control-sm" id="number" placeholder="-" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="invoice-detail-terms">
                                <div class="row justify-content-between">
                                    <div class="col-md-3">
                                        <button class="btn btn-primary additem btn-sm" data-toggle="modal"
                                            data-target="#productsModal">Agregar Pedidos</button>
                                    </div>
                                </div>
                            </div>
                            {{-- Detaalle --}}
                            <div class="invoice-detail-items">
                                <div class="table-responsive do-nicescrol" style="max-height: 450px; overflow: auto;">
                                    <table class="table table-bordered item-table">
                                        <thead>
                                            <tr class="">
                                                <th>#</th>
                                                <th>N° PED.</th>
                                                <th>N° DOC.</th>
                                                <th>CLIENTE</th>
                                                <th>EMPAQUETADOR</th>
                                                <th>MONTO.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @if (count($listaPedidos) > 0)
                                                @foreach ($listaPedidos as $index => $listaPedido)
                                                    <tr>
                                                        <td class="
                                                delete-item-row">
                                                <ul class="table-controls">
                                                    <li><a href="javascript:void(0);"
                                                            wire:click.prevent="removeProduct({{ $index }})"
                                                            class="delete-item"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x-circle">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                                            </svg></a></li>
                                                </ul>
                                                </td>
                                                <td>{{ str_pad($listaPedidos[$index]['id'], 5, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>{{ $listaPedidos[$index]['nroDocumento'] }}</td>
                                                <td class="text-left">
                                                    {{ $listaPedidos[$index]['cliente'] }}</td>
                                                <td class="text-left">
                                                    <select id="r{{ $index }}"
                                                        wire:change="addEmpaquetador({{ $index }}, $('#r'+{{ $index }}).val())"
                                                        class="form-control form-control-sm text-primary">
                                                        <option value="">Seleccione...</option>
                                                        @foreach ($empaquetadores as $e)
                                                            <option value="{{ $e->idEmpleado }}">
                                                                {{ $e->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="text-left">
                                                    S/.{{ number_format($listaPedidos[$index]['monto'], 2) }}</td>
                                            </tr>
                                            <?php $total += $listaPedidos[$index]['monto']; ?>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="6">Seleccione pedidos!!
                                                </td>
                                            </tr>
                                            @endif
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-detail-total">

                                <div class="row">

                                    <div class="col-md-4">

                                    </div>

                                    <div class="col-md-8">
                                        <div class="totals-row">

                                            <div class="invoice-totals-row invoice-summary-balance-due">

                                                <div class="invoice-summary-label text-primary">TOTAL</div>

                                                <div class="invoice-summary-value">
                                                    <div class="balance-due-amount text-primary">
                                                        <span
                                                            class="currency">S/.</span><span>{{ number_format($total, 2) }}</span>
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

                <div class="col-xl-3">

                    <div class="invoice-actions">

                        <div class="invoice-action-tax">

                            <h5>Fecha:</h5>

                            <div class="invoice-action-tax-fields">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control form-control-sm flatpickr-input"
                                                id="date" placeholder="YYYY-MM-DD" readonly="readonly"
                                                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                <div class="col-xl-12 col-md-4">
                                    <a href="javascript:void(0);" wire:click="store()" class="btn btn-primary btn-send">
                                        <svg wire:loading wire:target="store" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-loader spin mr-2">
                                            <line x1="12" y1="2" x2="12" y2="6"></line>
                                            <line x1="12" y1="18" x2="12" y2="22"></line>
                                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                            <line x1="2" y1="12" x2="6" y2="12"></line>
                                            <line x1="18" y1="12" x2="22" y2="12"></line>
                                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z">
                                            </path>
                                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                            <polyline points="7 3 7 8 15 8"></polyline>
                                        </svg> Guardar
                                    </a>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <a href="javascript:void(0);" wire:click="resetAll()"
                                        class="btn btn-success btn-download"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-alert-octagon">
                                            <polygon
                                                points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                            </polygon>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg> Resetear</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @include('Livewire.ListaPedidos.modal')

                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(document.getElementById('date'));

            window.livewire.on('lista-stored', message => {
                showMessage(message);
            });
            window.livewire.on('errors', message => {
                errorMessage(message);
            });
            window.livewire.on('error-empaquetador', message => {
                errorMessage(message);
            });

        });

        function errorMessage(message) {
            Snackbar.show({
                text: message,
                pos: 'top-right',
                actionText: 'Cerrar',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        }
    </script>
@endsection
