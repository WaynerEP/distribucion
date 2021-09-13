<!-- Modal -->
<div wire:ignore.self class="modal fade" id="productsModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PEDIDOS CONFIRMADOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <button wire:loading wire:target="addPedido" class="btn btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-loader spin text-primary ml-2">
                                <line x1="12" y1="2" x2="12" y2="6"></line>
                                <line x1="12" y1="18" x2="12" y2="22"></line>
                                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                <line x1="2" y1="12" x2="6" y2="12"></line>
                                <line x1="18" y1="12" x2="22" y2="12"></line>
                                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>N° DOC.</th>
                                <th>FECHA</th>
                                <th>CLIENTE</th>
                                <th>ESTADO</th>
                                <th>MONTO</th>
                                <th>SELECCIONAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->idPedido }}</td>
                                    <td>{{ $d->nDocumento }}</td>
                                    <td>{{ $d->fPedido }}</td>
                                    <td>{{ $d->nombre }} {{ $d->aPaterno }} {{ $d->aMaterno }}</td>
                                    <td><span class="badge outline-badge-primary"> Confirmado </span></td>
                                    <td>S/.{{ number_format($d->monto, 2) }}</td>
                                    <td class="text-center">
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-outline-success">
                                                <input type="checkbox" class="new-control-input" wire:click="addPedido({{ $d->idPedido }})">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
