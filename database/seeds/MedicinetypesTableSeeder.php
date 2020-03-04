<?php

use Illuminate\Database\Seeder;
use App\Medicinetype;

class MedicinetypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Medicinetype::create(['name'=>'oral']);
      Medicinetype::create(['name'=>'injection']);
    }
}
