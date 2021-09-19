@extends('Layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('titlePage')
    <h3>Vista Previa</h3>
@endsection
@section('content')
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">

                    <div class="col-xl-9">

                        <div class="invoice-container">
                            <div class="invoice-inbox">

                                <div id="ct"
                                    class="">
                                
                                <div class="
                                    invoice-00001">
                                    <div class="content-section">

                                        <div class="inv--head-section inv--detail-section">

                                            <div class="row">

                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <div class="d-flex">
                                                        <img class="company-logo"
                                                            src="{{ asset('assets/img/cork-logo.png') }}" alt="compañía"
                                                            loading="lazy" _mstalt="157040">
                                                        <h3 class="in-heading align-self-center" _msthash="1343524"
                                                            _msttexthash="137267">Am'u Distribuciones.</h3>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 text-sm-right">
                                                    <p class="inv-list-number" _msthash="989248" _msttexthash="155337"><span
                                                            class="inv-title"
                                                            _istranslated="1">{{ $dc[0]->tipoDocumento }} :</span> <span
                                                            class="inv-number" _istranslated="1">#{{ str_pad($dc[0]->nDocumento, 4, "0", STR_PAD_LEFT) }}</span></p>
                                                </div>

                                                <div class="col-sm-6 align-self-center mt-3">
                                                    <p class="inv-street-addr" _msthash="989443" _msttexthash="209937">Calle
                                                        Delta XYZ</p>
                                                    <p class="inv-email-address" _msthash="989560" _msttexthash="303771">
                                                        info@company.com</p>
                                                    <p class="inv-email-address" _msthash="989677" _msttexthash="88556">
                                                        (120) 456 789</p>
                                                </div>
                                                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                    <p class="inv-created-date" _msthash="989638" _msttexthash="546416">
                                                        <span class="inv-title" _istranslated="1">Fecha de la
                                                            {{ strtolower($dc[0]->tipoDocumento) }} :</span> <span
                                                            class="inv-date"
                                                            _istranslated="1">{{ $dc[0]->fecha }}</span>
                                                    </p>
                                                    <p class="inv-due-date" _msthash="989755" _msttexthash="624858"><span
                                                            class="inv-title" _istranslated="1">Hora de la
                                                            {{ strtolower($dc[0]->tipoDocumento) }}
                                                            :</span> <span class="inv-date"
                                                            _istranslated="1">{{ $dc[0]->hora }}</span></p>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="inv--detail-section inv--customer-detail-section">

                                            <div class="row">

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                    <p class="inv-to" _msthash="989404" _msttexthash="133692">
                                                        Facturado a:</p>
                                                </div>

                                                <div
                                                    class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                    <h6 class=" inv-title" _msthash="1033045" _msttexthash="392184">
                                                        Información de pago:</h6>
                                                </div>

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                    <p class="inv-customer-name" _msthash="989794" _msttexthash="133640">
                                                        {{ $dc[0]->cliente }}</p>
                                                    <p class="inv-street-addr" _msthash="989911" _msttexthash="1427387">405
                                                        {{ $dc[0]->direccion }} -
                                                        {{ ucfirst(strtolower($dc[0]->distrito)) }}</p>
                                                    <p class="inv-email-address text-info" _msthash="990028"
                                                        _msttexthash="303680">
                                                        {{ $dc[0]->email }}</p>
                                                    <p class="inv-email-address" _msthash="990145" _msttexthash="86515">
                                                        +51 {{ $dc[0]->telefono }}</p>
                                                </div>

                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                    <div class="inv--payment-info">
                                                        <p><span class=" inv-subtitle" _msthash="1699490"
                                                                _msttexthash="269243">Pago:</span> <span _msthash="1699646"
                                                                _msttexthash="271362">El pago es contra entrega</span></p>
                                                        {{-- <p><span class=" inv-subtitle" _msthash="1699698"
                                                                _msttexthash="289289">Número de cuenta: </span> <span
                                                                _msthash="1699854" _msttexthash="78975">1234567890</span>
                                                        </p>
                                                        <p><span class=" inv-subtitle" _msthash="1699906"
                                                                _msttexthash="179556">Código SWIFT:</span> <span
                                                                _msthash="1700062" _msttexthash="52884">VS70134</span></p>
                                                        <p><span class=" inv-subtitle" _msthash="1700114"
                                                                _msttexthash="68341">País: </span> <span _msthash="1700270"
                                                                _msttexthash="230711">Estados Unidos</span></p> --}}

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="inv--product-table-section">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead
                                                        class="">
                                                        <tr>
                                                            <th scope="
                                                        col" _msthash="1904942" _msttexthash="35893">S.No</th>
                                                        <th scope="col" _msthash="1905072" _msttexthash="155441">Artículos
                                                        </th>
                                                        <th class="text-right" scope="col" _msthash="1905202"
                                                            _msttexthash="33592">Qty</th>
                                                        <th class="text-right" scope="col" _msthash="1905332"
                                                            _msttexthash="76154">Precio</th>
                                                        <th class="text-right" scope="col" _msthash="1905462"
                                                            _msttexthash="96980">Importe</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total = 0;
                                                            $discount = 0;
                                                            $igv = 0.18;
                                                        @endphp
                                                        @foreach ($dp as $d)
                                                            <tr>
                                                                <td _msthash="1912404" _msttexthash="4459">
                                                                    {{ $loop->index + 1 }}</td>
                                                                <td _msthash="1912534" _msttexthash="1455909">
                                                                    {{ $d->nombre }}</td>
                                                                <td class="text-right" _msthash="1912664"
                                                                    _msttexthash="4459">{{ $d->cantidadPedida }}</td>
                                                                <td class="text-right" _msthash="1912794"
                                                                    _msttexthash="47827">S/.
                                                                    {{ number_format($d->precio, 2) }}</td>
                                                                <td class="text-right" _msthash="1912924"
                                                                    _msttexthash="47827">S/.
                                                                    {{ number_format($d->precio * $d->cantidadPedida, 2) }}
                                                                </td>
                                                            </tr>
                                                            <?php $total += $d->cantidadPedida * $d->precio;
                                                            $discount += $d->descuento;
                                                            ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="inv--total-amounts">

                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="text-sm-right">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                <p class="" _msthash=" 2024776" _msttexthash="123435">Sub
                                                                    Total: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="" _msthash=" 2024971" _msttexthash="57681">S/.
                                                                    {{ number_format($total, 2) }}</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class="" _msthash=" 2025166" _msttexthash="345579">
                                                                    Monto del impuesto (18%): </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="" _msthash=" 2025361" _msttexthash="48321">S/.
                                                                    {{ number_format($total * $igv, 2) }}</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">
                                                                    <font _mstmutation="1" _msthash="2025556"
                                                                        _msttexthash="169286">Descuento : <span
                                                                            class="discount-percentage" _mstmutation="1"
                                                                            _istranslated="1"></span></font>
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="" _msthash=" 2025751" _msttexthash="40053">
                                                                    S/.{{ number_format($discount, 2) }}</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="" _msthash=" 2089256" _msttexthash="218413">
                                                                    Total general : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="" _msthash=" 2089464" _msttexthash="58526">
                                                                    S/.{{ number_format($total + $total * $igv, 2) }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--note">

                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                    <p _msthash="990457" _msttexthash="1443585">Nota: Gracias por hacer
                                                        negocios con nosotros.</p>
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

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                {{-- <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-send" _msthash="3445013"
                                        _msttexthash="231647">Enviar factura</a>
                                </div> --}}
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print"
                                        _msthash="3445208" _msttexthash="161707">Imprimir</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-download action-print" _msthash="3445403"
                                        _msttexthash="131963">Descargar</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="{{ route('listPedidos') }}" class="btn btn-dark btn-edit" _msthash="3445598"
                                        _msttexthash="75699">Regresar</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>


        </div>

    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/apps/invoice-preview.js') }}"></script>
@endsection
