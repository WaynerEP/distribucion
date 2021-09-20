<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateState extends Component
{
    public function render()
    {
        return view('livewire.UpdatePedido.estado')
            ->extends('layouts.app')
            ->section('content');
    }
}
