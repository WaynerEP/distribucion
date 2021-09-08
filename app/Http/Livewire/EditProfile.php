<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public $dni, $nombre, $aPaterno, $aMaterno, $telefono, $fNacimiento, $email, $direccion, $referencia, $genero, $seguro, $idNivel;


    public function mount()
    {
        $user = auth()->user()->profile;
        $this->dni = $user->dni;
        $this->nombre = $user->nombre;
        $this->aPaterno = $user->aPaterno;
        $this->aMaterno = $user->aMaterno;
        $this->telefono = $user->telefono;
        $this->fNacimiento = $user->fNacimiento;
        $this->email = $user->email;
        $this->direccion = $user->direccion;
        $this->referencia = $user->referencia;
        $this->genero = $user->genero;
        $this->seguro = $user->seguro;
        $this->idNivel = $user->idNivel;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
