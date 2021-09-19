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
                                                            class="inv-title" _istranslated="1">LISTA :</span> <span
                                                            class="inv-number"
                                                            _istranslated="1">#{{ str_pad($info[0]->idListaPedidos, 4, '0', STR_PAD_LEFT) }}</span>
                                                    </p>
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
                                                        <span class="inv-title" _istranslated="1">Fecha de Registro
                                                            :</span> <span class="inv-date"
                                                            _istranslated="1">{{ $info[0]->fecha }}</span>
                                                    </p>
                                                    <p class="inv-due-date" _msthash="989755" _msttexthash="624858"><span
                                                            class="inv-title" _istranslated="1">Hora del Registro

                                                            :</span> <span class="inv-date"
                                                            _istranslated="1">{{ $info[0]->hora }}</span></p>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="inv--detail-section inv--customer-detail-section">

                                            <div class="row">

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                    <p class="inv-to" _msthash="989404" _msttexthash="133692">
                                                        Información de la Lista</p>
                                                </div>

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                    <p class="inv-customer-name" _msthash="989794" _msttexthash="133640">
                                                        {{ $info[0]->lista }}</p>
                                                    <p class="inv-street-addr" _msthash="989911" _msttexthash="1427387">
                                                        Registrador:
                                                        {{ $info[0]->registrador }}</p>
                                                    <p class="inv-email-address text-info" _msthash="990028"
                                                        _msttexthash="303680"> Nro de Pedidos:
                                                        {{ $info[0]->nPedido }}</p>
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
                                                        <th scope="col" _msthash="1905072" _msttexthash="155441">Documento
                                                        </th>
                                                        <th class="text-left" scope="col" _msthash="1905202"
                                                            _msttexthash="33592">Doc.No</th>
                                                        <th class="text-left" scope="col" _msthash="1905332"
                                                            _msttexthash="76154">Registro</th>
                                                        <th class="text-left" scope="col" _msthash="1905462"
                                                            _msttexthash="96980">Cliente</th>
                                                        <th class="text-left" scope="col" _msthash="1905462"
                                                            _msttexthash="96980">Monto</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($pedidos as $d)
                                                            <tr>
                                                                <td _msthash="1912404" _msttexthash="4459"
                                                                    class="text-primary">
                                                                    {{ $d->idPedido }}</td>
                                                                <td _msthash="1912534" _msttexthash="1455909"
                                                                    class="text-primary">
                                                                    {{ $d->tipoDocumento }}</td>
                                                                <td class="text-left text-primary" _msthash="1912664"
                                                                    _msttexthash="4459">
                                                                    {{ $d->nDocumento }}</td>
                                                                <td class="text-left text-primary" _msthash="1912794"
                                                                    _msttexthash="47827">
                                                                    {{ $d->fecha }}</td>
                                                                <td class="text-left text-primary" _msthash="1912924"
                                                                    _msttexthash="47827">
                                                                    {{ $d->cliente }}
                                                                </td>
                                                                <td class="text-left text-primary" _msthash="1912924"
                                                                    _msttexthash="47827">S/.
                                                                    {{ $d->monto }}
                                                                </td>
                                                            </tr>
                                                            <?php $total += $d->monto;
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
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="" _msthash=" 2089256" _msttexthash="218413">
                                                                    Total general : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="" _msthash=" 2089464" _msttexthash="58526">
                                                                    S/.{{ number_format($total, 2) }}
                                                                </h4>
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

                </div>

                <div class="col-xl-3">

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print"
                                        _msthash="3445208" _msttexthash="161707">Imprimir</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-download action-print"
                                        _msthash="3445403" _msttexthash="131963">Descargar</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="{{ route('listOrder') }}" class="btn btn-dark btn-edit" _msthash="3445598"
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
