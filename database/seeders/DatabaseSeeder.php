<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Retenciones::factory(30)->create();
        \App\Models\Retencion::factory(20)->create();
        \App\Models\Persona::factory(20)->create();
        \App\Models\Mercancias::factory(50)->create();
        //\App\Models\Seccion::factory(20)->create();
        //\App\Models\Tipomercancia::factory(20)->create();
        \App\Models\Almacen::factory(5)->create();


        \App\Models\User::factory()->create([
            'username' => 'Test User',
        ]);
    }
}
