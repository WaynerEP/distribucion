<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Carbon\Carbon;
use Hash;

use App\Models\UserMetaData;

class profile extends Component
{

    public $current_password, $new_password, $confirm_password;

    public function render()
    {
        return view('livewire.Profile.profile');
    }


    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|min:8|max:100',
            'new_password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = auth()->user();
        if (Hash::check($this->current_password, $user->password)) {
            $user->forceFill([
                'password' => Hash::make($this->new_password),
            ])->save();
            $date = Carbon::now();
            UserMetaData::create([
                'clave' => 'password_change',
                'valor' => Hash::make($this->current_password),
                'tipo' => 'password_updated',
                'fecha' => $date,
                'idUsuario' => $user->idUsuario,
            ]);
            $this->resetUI();
            $this->success();
        } else {
            $this->addError('current_password', __('La contraseña proporcionada no coincide con su contraseña actual.'));
        }
    }


    public function resetUI()
    {
        $this->reset('current_password', 'new_password', 'confirm_password');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function success()
    {
        $this->dispatchBrowserEvent('password_updated', [
            'message' => 'Contraseña actualizada!'
        ]);
    }
}
