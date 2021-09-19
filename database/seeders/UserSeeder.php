<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Persona::create([
        //     'idDistrito' => 5,
        //     'firstName' => 'Juan Alberto',
        //     'lastName' => 'Sanchez Perez',
        //     'companyName'=>'Amu Distribuciones',
        //     'contactPhone'=>'930127959',
        //     'address'=>'Jr. Alianza #45',
        //     'postcode'=>0701,
        // ]);
        User::create([
            'name' => 'Juan Alberto Sanchez Perez',
            'email' => 'juan_sanchez@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
