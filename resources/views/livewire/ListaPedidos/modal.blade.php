<!-- Modal -->
<div wire:ignore.self class="modal fade" id="productsModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pedidos Confirmados</h5>
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
                        <div class="search-input-group-style input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                            </div>
                            <input type="text" wire:model="search" class="form-control"
                                placeholder="Buscar por cliente...">
                        </div>
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
                                                <input type="checkbox" class="new-control-input"
                                                    wire:click="addPedido({{ $d->idPedido }})">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg" data-dismiss="modal">
                    Cerrar
                </button>
            </div>

            <div wire:loading wire:target="addPedido">
                <livewire:loader>
            </div>
        </div>
    </div>
</div>
