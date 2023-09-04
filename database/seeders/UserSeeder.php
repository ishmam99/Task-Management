<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'       => 'admin',
            'phone'      => '01123123123',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make('123123123'),
            'is_admin'   => 1,
           
        ]);
    }
}
