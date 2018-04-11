<?php
use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class LaratrustSeeder extends Seeder
{
  public function run()
  {
    $b = new Role();
    $b->name         = 'superadministrator';
    $b->display_name = 'Superadministrator'; // optional
    $b->description  = 'User is allowed to manage and edit other users'; // optional
    $b->save();

    $super = User::create([
        'name' => 'Superadministrator',
        'email' => 'superadministrator@mekarjaya.com',
        'password' => Hash::make('password'),
    ]);

    $super->attachRole($b);
  }
}
