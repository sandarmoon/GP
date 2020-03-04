<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $administrator = User::create([
        'name' => 'Super Admin',
        'email' => 'admin@mail.com',
        'password' => Hash::make('123456789'),
      ]);

      $administrator->assignRole('Super_Admin');
    }
}
