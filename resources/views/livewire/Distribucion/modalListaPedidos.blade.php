<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modalPedido" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lista Diaria</h5>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>LISTA</th>
                                <th>FECHA</th>
                                <th>PEDIDOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($pedidos) > 0)
                                @foreach ($pedidos as $z)
                                    <tr style="cursor: pointer;"
                                        wire:click="addLista({{ $z->idListaPedidos }},'{{ $z->nombre }}')">
                                        <td class="text-primary">{{ $z->idListaPedidos }}</td>
                                        <td>📑 {{ $z->nombre }}</td>
                                        <td>{{ $z->fecha }}</td>
                                        <td><span class="badge badge-success"> Pedidos Listos </span></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="4">Sin resultados!!
                                    </td>
                                </tr>
                            @endif
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
