@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/apps/todolist.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('titlePage')
    <h3>Nuevos Pedidos</h3>
@endsection

@section('content')
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="doc-container">
                @livewire('pedidos')
            </div>

        </div>
    </div>
@endsection
@section('scripts')

    <script>
        flatpickr(document.getElementById('date'));
        window.addEventListener('order-stored', event => {
            swal({
                title: 'Registrando pedido!',
                timer: 1500,
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
                        timer: 3000,
                        padding: '2em'
                    });

                    toast({
                        type: 'success',
                        title: 'Registrado Exitosamente!',
                        padding: '2em',
                    })
                }
            })
        })
        document.addEventListener('DOMContentLoaded', function() {

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
