<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Rol;

class StartSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRol = new Rol();
        $userRol->name = "User";
        $userRol->save();

        $adminRol = new Rol();
        $adminRol->name = "Admin";
        $adminRol->save();
    }
}
