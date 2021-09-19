@section('titlePage')
    <h3>Nuevos Pedidos</h3>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css">
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
                                        <label for="number">N° Documento:</label>
                                        <input type="text" wire:model="nroDocument" readonly
                                            class="form-control form-control-sm" id="number" placeholder="-">
                                    </div>
                                </div>

                            </div>
                            {{-- {{ $orderProducts }} --}}
                            <div class="invoice-detail-header">

                                <div class="row justify-content-between">
                                    <div class="col-xl-5 invoice-address-company">

                                        <h4>Empleado:-</h4>

                                        <div class="invoice-address-company-fields">

                                            <div class="form-group row">
                                                <label for="company-name"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Buscar</label>
                                                <div class="col-sm-9 btn-group btn-group-lg show">
                                                    <select id="inputState" wire:model="SelectedEmployee" class="form-control form-control-sm">
                                                        <option value="">seleccione...</option>
                                                        @foreach ($employees as $e)
                                                            <option value="{{ $e->idEmpleado }}">{{ $loop->index+1 }}-{{ $e->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company-name"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" wire:model="nameEmployee"
                                                        class="form-control form-control-sm" id="company-name"
                                                        placeholder="Name">
                                                    @error('idEmployee')
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="employee-email"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" wire:model="emailEmployee"
                                                        class="form-control form-control-sm" id="employee-email"
                                                        placeholder="name@employee.com">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="employee-document"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Dni</label>
                                                <div class="col-sm-9">
                                                    <input type="text" wire:model="dniEmployee"
                                                        class="form-control form-control-sm" id="employee-document"
                                                        placeholder="xxxxxx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xl-5 invoice-address-client">

                                        <h4>Cliente:-</h4>

                                        <div class="invoice-address-client-fields">

                                            <div class="form-group row">
                                                <label for="client-name"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Buscar</label>
                                                <div class="col-sm-9 btn-group btn-group-lg show">
                                                    <input type="text" wire:model="searchCustomer"
                                                        class="form-control form-control-sm"
                                                        placeholder="Search cliente here...">
                                                    @if ($searchCustomer)
                                                        <div class="dropdown-menu show bg-light-info"
                                                            style="width:100%; height-max:0px; overflow:auto; will-change: transform; position: absolute; transform: translate3d(0px, 46px, 0px); top: 0px; left: 0px;"
                                                            x-placement="bottom-start">
                                                            @if (count($customers) > 0)
                                                                @foreach ($customers as $customer)
                                                                    <a class="dropdown-item"
                                                                        wire:click="selectedCustomer({{ $customer->idCliente }})"
                                                                        href="javascript:void(0);">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-user-check">
                                                                            <path
                                                                                d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                                                            </path>
                                                                            <circle cx="8.5" cy="7" r="4"></circle>
                                                                            <polyline points="17 11 19 13 23 9">
                                                                            </polyline>
                                                                        </svg>
                                                                        {{ $customer->nombre }}
                                                                        {{ $customer->aPaterno }} -
                                                                        {{ $customer->dni }}</a>
                                                                @endforeach
                                                            @else
                                                                <a class="dropdown-item" href="javascript:void(0);">No
                                                                    hay
                                                                    resultados!🙁</a>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="client-name"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" wire:model="clientNombre"
                                                        class="form-control form-control-sm" id="client-email"
                                                        placeholder="Name" data-placement="bottom"
                                                        title="Tooltip on bottom">
                                                    @error('idClient')
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="client-email"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" wire:model="clientEmail"
                                                        class="form-control form-control-sm" id="client-email"
                                                        placeholder="name@gmail.com">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="client-address"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Dirección</label>
                                                <div class="col-sm-9">
                                                    <input type="text" wire:model="clientDireccion"
                                                        class="form-control form-control-sm" id="client-address"
                                                        placeholder="XYZ Street">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-detail-terms">
                                <div class="row justify-content-between">
                                    <div class="col-md-3">
                                        <button class="btn btn-primary additem btn-sm" data-toggle="modal"
                                            data-target="#productsModal">Agregar productos</button>
                                    </div>
                                </div>
                            </div>
                            {{-- Detaalle --}}
                            <div class="invoice-detail-items">
                                <div class="table-responsive do-nicescrol" style="max-height: 450px; overflow: auto;">
                                    <table class="table table-bordered item-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>CANT.</th>
                                                <th>DSCTO.</th>
                                                <th class="text-center">Importe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                                $discount = 0;
                                            @endphp
                                            @if (count($orderProducts) > 0)
                                                @foreach ($orderProducts as $index => $orderProduct)
                                                    <tr>
                                                        <td class="delete-item-row">
                                                            <ul class="table-controls">
                                                                <li><a href="javascript:void(0);"
                                                                        wire:click.prevent="removeProduct({{ $index }})"
                                                                        class="delete-item"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-x-circle">
                                                                            <circle cx="12" cy="12" r="10"></circle>
                                                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                                                        </svg></a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="description">
                                                            <input type="text" class="form-control form-control-sm"
                                                                value="{{ $orderProducts[$index]['nombre'] }}"
                                                                name="product" placeholder="Item Description">
                                                        </td>
                                                        <td class="rate">
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="price"
                                                                value="{{ $orderProducts[$index]['precio'] }}"
                                                                placeholder="Price">
                                                        </td>
                                                        <td class="rate">
                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <button class="btn px-2 btn-primary"
                                                                        wire:click="decrease({{ $index }})"
                                                                        type="button">-</button>
                                                                </span>
                                                                <input type="text" id="r{{ $index }}"
                                                                    wire:keydown.enter="addQuantity({{ $index }}, $('#r'+{{ $index }}).val())"
                                                                    class="form-control"
                                                                    value="{{ $orderProducts[$index]['cantidad'] }}">
                                                                <span class="input-group-append">
                                                                    <button class="btn px-2 btn-primary"
                                                                        wire:click="addProduct({{ $index }},1)"
                                                                        type="button">+</button>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="gty">
                                                            <input type="text" id="d{{ $index }}"
                                                                wire:keydown.enter="applyDiscount({{ $index }}, $('#d'+{{ $index }}).val())"
                                                                class="form-control form-control-sm"
                                                                value="{{ number_format($orderProducts[$index]['discount'], 2) }}"
                                                                name="discount" placeholder="0.00">
                                                        </td>
                                                        <td class="text-center text-primary amount align-items-center">
                                                            <span class="editable-amount"><span
                                                                    class="currency">S/.</span>
                                                                <span
                                                                    class="amount">{{ number_format($orderProducts[$index]['importe'], 2) }}</span></span>
                                                        </td>
                                                    </tr>
                                                    <?php $total += $orderProducts[$index]['importe'];
                                                    $discount += $orderProducts[$index]['discount'];
                                                    ?>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="6">Seleccione producto a agregar
                                                        al Pedido!
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
                                            <div class="invoice-totals-row invoice-summary-subtotal">

                                                <div class="invoice-summary-label">Subtotal</div>

                                                <div class="invoice-summary-value">
                                                    <div class="subtotal-amount">
                                                        <span class="currency">S/.</span><span
                                                            class="amount">{{ number_format($total, 2) }}</span>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="invoice-totals-row invoice-summary-total">

                                                <div class="invoice-summary-label">Total Descuentos</div>

                                                <div class="invoice-summary-value">
                                                    <div class="total-amount">
                                                        <span
                                                            class="currency">S/.</span><span>{{ number_format($discount, 2) }}</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="invoice-totals-row invoice-summary-tax">

                                                <div class="invoice-summary-label">IGV</div>

                                                <div class="invoice-summary-value">
                                                    <div class="tax-amount">
                                                        <span>18%</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="invoice-totals-row invoice-summary-balance-due">

                                                <div class="invoice-summary-label text-primary">TOTAL</div>

                                                <div class="invoice-summary-value">
                                                    <div class="balance-due-amount text-primary">
                                                        <span
                                                            class="currency">S/.</span><span>{{ number_format($total + $total * $igv, 2) }}</span>
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

                        <div class="invoice-action-currency">

                            <div class="form-group px-2">
                                <label for="documentTipo">TIPO DE DOCUMENTO</label>
                                <select wire:model="TipoDoc" id="documentTipo" class="form-control">
                                    <option value="BOLETA">Boleta</option>
                                    <option value="FACTURA">Factura</option>
                                </select>
                                @error('TipoDoc')
                                    <small class="invalid-feedback d-block" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>

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
                                    <a href="javascript:void(0);" wire:click="store()"
                                        class="btn btn-primary btn-send">
                                        <div wire:loading wire:target="store"
                                            class="spinner-border text-white mr-2 align-self-center loader-sm ">
                                            Loading...</div>
                                        Guardar
                                    </a>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <a href="javascript:void(0);" wire:click="resetAll()"
                                        class="btn btn-success btn-download">Resetear</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @include('Livewire.Pedidos.modalProducts')

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(document.getElementById('date'));

            window.livewire.on('order-stored', event => {
                swal({
                    title: 'Registrando pedido!',
                    timer: 1000,
                    padding: '2em',
                    onOpen: function() {
                        swal.showLoading()
                    }
                }).then(function(result) {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.timer
                    ) {
                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2500,
                            padding: '2em'
                        });

                        toast({
                            type: 'success',
                            title: 'Registrado Exitosamente!',
                            padding: '2em',
                        })
                    }
                })
            });
            window.livewire.on('errors', message => {
                errorMessage(message);
            });

            window.livewire.on('error_stock', message => {
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
