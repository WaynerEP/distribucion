<?php

namespace App\Http\Livewire;

use Livewire\Component;

class permisosController extends Component
{
    public function render()
    {
        return view('livewire.Users.permisos')
            ->extends('layouts.app')
            ->section('content');;
    }
}
