<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detailsModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
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
                                <th class="checkbox-column">
                                    #
                                </th>
                                <th>PRODUCTO</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th>DESCUENTO</th>
                                <th>IMPORTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($details) > 0)
                                @foreach ($details as $d)
                                    <tr>
                                        <td class="checkbox-column">
                                            {{ $d->idPedido }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="avatar avatar-sm mr-2">
                                                    @if ($d->image)
                                                        <img alt="{{ $d->nombre }}" loading="lazy"
                                                            class="rounded"
                                                            src="{{ asset('storage/products/' . $d->image) }}">
                                                    @else
                                                        <img src="{{ asset('assets/img/90x90.jpg') }}"
                                                            class="profile-img" alt="image" loading="lazy">
                                                    @endif
                                                </div>
                                                <p class="align-self-center mb-0">{{ $d->nombre }}</p>
                                            </div>
                                        </td>
                                        <td>S/.{{ number_format($d->precio, 2) }}</td>
                                        <td>{{ $d->cantidadPedida }}</td>
                                        <td>S/.{{ number_format($d->descuento, 2) }}</td>
                                        <td>{{ number_format($d->cantidadPedida * $d->precio - $d->descuento, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="6"> Sin resultados!!</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="text-right text-primary" colspan="5">
                                    <h5>Total:</h5>
                                </td>
                                <td class="text-rigth text-primary"> {{ number_format($sumDetails, 2) }}</td>
                            </tr>
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
