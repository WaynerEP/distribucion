<?php

namespace App\Http\Livewire;

use Livewire\Component;

class rolesController extends Component
{
    public function render()
    {
        return view('livewire.Users.roles')
            ->extends('layouts.app')
            ->section('content');;
    }
}
