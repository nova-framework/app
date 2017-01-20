<?php

namespace App\Database\Seeds;

use Nova\Database\Seeder;
use Nova\Database\ORM\Model;
use Nova\Support\Facades\Hash;

use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'id'              => 1,
            'username'        => 'admin',
            'password'        => Hash::make('admin'),
            'email'           => 'admin@novaframework.dev',
            'active'          => 1,
            'activation_code' => '',
            'remember_token'  => '',
        ));
    }
}
