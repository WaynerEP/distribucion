@extends('layouts.app')
@section('titlePage')
    <h3>Dashboard</h3>
@endsection
@section('styles')
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css">
@endsection
@section('content')

@endsection
@section('scripts')
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <script>
        window.onload = showMessage();

        function showMessage() {
            Snackbar.show({
                text: 'Bienvenido al Sistema!',
                pos: 'bottom-right',
                actionText: 'Cerrar',
                actionTextColor: '#fff',
                backgroundColor: '#4361ee'
            });
        }
    </script>
@endsection
