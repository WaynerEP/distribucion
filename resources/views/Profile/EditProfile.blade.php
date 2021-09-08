@extends('Layouts.app')

@section('styles')
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css">
@endsection
@section('titlePage')
    <h3>Account Settings</h3>
@endsection
@section('content')
    <livewire:edit-profile />
@endsection
