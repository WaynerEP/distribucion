<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;

class UpdateProfile extends Component
{
    public function render()
    {
        return view('livewire.Profile.edit-profile');
    }
    use WithFileUploads;


    public $dni, $nombre, $aPaterno, $aMaterno, $telefono, $fNacimiento, $email, $direccion, $referencia, $sexo, $seguro, $idNivel, $image;
    public $selected_id, $photoProfile;

    public function mount()
    {
        $user = auth()->user()->profile;
        $this->dni = $user->dni;
        $this->photoProfile = auth()->user()->photo_profile;
        $this->nombre = $user->nombre;
        $this->aPaterno = $user->aPaterno;
        $this->aMaterno = $user->aMaterno;
        $this->telefono = $user->telefono;
        $this->fNacimiento = $user->fNacimiento;
        $this->email = $user->email;
        $this->direccion = $user->direccion;
        $this->referencia = $user->referencia;
        $this->sexo = $user->genero;
        $this->seguro = $user->seguro;
        $this->idNivel = $user->idNivel;
        $this->selected_id = $user->dni;
    }


    public function updateProfile()
    {
        $this->validate(
            [
                'fNacimiento' => 'required',
                'email' => 'required|email|max:100|unique:ciudadano,email,' . $this->selected_id . ',dni',
                'telefono' => 'required|max:20',
                'sexo' => 'required',
                'direccion' => 'required',
            ],
            [
                'fNacimiento.required' => 'El campo fecha de nacimiento obligatorio',
            ]
        );
        $ciudadano = Ciudadano::find($this->selected_id);
        $ciudadano->Update([
            'telefono' => $this->telefono,
            'fNacimiento' => $this->fNacimiento,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'referencia' => $this->referencia,
            'genero' => $this->sexo,
            'seguro' => $this->seguro,
        ]);
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/profile', $customFileName);

            $user = auth()->user();
            $user->photo_profile = $customFileName;
            $user->save();

            $date = Carbon::now();
            UserMetaData::create([
                'clave' => 'photo_change',
                'valor' => $customFileName,
                'tipo' => 'photo_updated',
                'fecha' => $date,
                'idUsuario' => $user->idUsuario,
            ]);
        }
        $this->success();
        $this->resetErrorsUI();
    }



    public function resetErrorsUI()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }



    public function success()
    {
        $this->dispatchBrowserEvent('profile_updated', [
            'message' => 'Datos Actualizados!'
        ]);
    }
}
