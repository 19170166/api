<?php

use Illuminate\Database\Seeder;
use Illuminate○2Support\Facades\DB;
use Faker\Factory as Faker;

class SeedProducto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pro=factory(App\ModeloProducto::class,15)->create();
    }
}
