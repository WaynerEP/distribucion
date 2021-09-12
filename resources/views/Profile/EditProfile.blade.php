@extends('Layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('titlePage')
    <h3>Account Settings</h3>
@endsection
@section('content')
    @livewire('update-profile')
@endsection
@section('scripts')
    <script>
        window.addEventListener('profile_updated', event => {
            showMessage(event.detail.message);
        })
    </script>
@endsection
