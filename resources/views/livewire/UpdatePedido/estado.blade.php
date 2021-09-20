@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('titlePage')
    <h3>Cambiar Estado</h3>
@endsection

<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12">

        <div class="mail-box-container">
            <div class="mail-overlay"></div>

            <div class="tab-title">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <h5 class="app-title">Todo List</h5>
                    </div>

                    <div class="todoList-sidebar-scroll ps ps--active-y">
                        <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                            <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link list-actions {{ $tipoestado == 1 ? 'active' : '' }}"
                                        wire:click="changePedidosByEstado('PENDIENTE','1')" href="#pills-important"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg> Pendientes <span
                                            class="todo-badge badge">{{ $tipoestado == 1 ? sizeof($data) : '' }}</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link list-actions {{ $tipoestado == 2 ? 'active' : '' }}"
                                        wire:click="changePedidosByEstado('TOMADA','2')" href="#pills-inbox"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                            <line x1="8" y1="6" x2="21" y2="6"></line>
                                            <line x1="8" y1="12" x2="21" y2="12"></line>
                                            <line x1="8" y1="18" x2="21" y2="18"></line>
                                            <line x1="3" y1="6" x2="3" y2="6"></line>
                                            <line x1="3" y1="12" x2="3" y2="12"></line>
                                            <line x1="3" y1="18" x2="3" y2="18"></line>
                                        </svg> Tomados <span
                                            class="todo-badge badge">{{ $tipoestado == 2 ? sizeof($data) : '' }}</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link list-actions {{ $tipoestado == 3 ? 'active' : '' }}"
                                        wire:click="changePedidosByEstado('LISTA','3')" href="#pills-sentmail"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-thumbs-up">
                                            <path
                                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                            </path>
                                        </svg> Hechos <span
                                            class="todo-badge badge">{{ $tipoestado == 3 ? sizeof($data) : '' }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="todo-inbox" class="accordion todo-inbox">
                <div class="search">
                    <input type="text" class="form-control input-search" placeholder="Aqui puedes ver tus pedidos...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-menu mail-menu d-lg-none">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </div>
                <div class="todo-box">
                    <div id="ct" class="todo-box-scroll">
                        @if (count($data) > 0)
                            @foreach ($data as $d)
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            @if ($tipoestado == 3)
                                                <span class="badge outline-badge-success"> Listo </span>
                                            @else
                                                <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox"
                                                        wire:click="changeStatePedido({{ $d->idPedido }})"
                                                        class="new-control-input inbox-chkbox">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            @endif
                                        </div>

                                        <div class="todo-content">
                                            <h5 class="todo-heading">
                                                Pedido N° {{ str_pad($d->idPedido, 4, '0', STR_PAD_LEFT) }}</h5>
                                            <p class="meta-date">{{ $d->fecha }}</p>
                                            <p class="todo-text">
                                                El pedido con nro de Documento {{ $d->nDocumento }}, asignado para
                                                empaquetamiento se encuentra en estado de {{ $d->estado }}.
                                            </p>
                                        </div>

                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle warning" href="#" role="button"
                                                    id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-alert-octagon">
                                                        <polygon
                                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                        </polygon>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12" y2="16"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="todo-item all-list">
                                <div class="todo-item-inner">
                                    <div class="todo-content text-center">
                                        <h5 class="todo-heading">No tienes ningún pedido!! 📑</h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div wire:loading>
        <div class="blockUI blockOverlay"
            style="z-index: 1200; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(27, 32, 36); opacity: 0.6;  position: fixed;">
        </div>
        <div class="blockUI blockMsg blockPage"
            style="z-index: 1201; position: fixed; padding: 0px; margin: 0px; width: 30%; top: 40%; left: 35%; text-align: center; color: rgb(255, 255, 255); border: 0px; background-color: transparent; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-loader spin">
                <line x1="12" y1="2" x2="12" y2="6"></line>
                <line x1="12" y1="18" x2="12" y2="22"></line>
                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                <line x1="2" y1="12" x2="6" y2="12"></line>
                <line x1="18" y1="12" x2="22" y2="12"></line>
                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
            </svg>
            Cargando
        </div>
    </div>
</div>

@section('scripts')

@endsection
