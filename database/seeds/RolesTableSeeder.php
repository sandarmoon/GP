<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create(['name'=>'Super_Admin']);
      Role::create(['name'=>'Admin']);
      Role::create(['name'=>'Doctor']);
      Role::create(['name'=>'Reception']);
    }
}
