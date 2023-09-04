<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Department::create(['name'=> 'Administration/operations']);
        Department::create(['name'=> 'Research and development']);
        Department::create(['name'=> 'Human resources ']);
        Department::create(['name'=> 'Accounting and finance ']);
        Department::create(['name'=> 'IT ']);
        Department::create(['name'=> 'Security ']);
        Position::create(['name'=>'Executive', 'rank' => 6]);
        Position::create(['name'=>'Manager', 'rank' => 3]);
        Position::create(['name'=>'Assistant Manager', 'rank' => 4]);
        Position::create(['name'=>'Junior Executive', 'rank' => 7]);
        Position::create(['name'=>'Senior Executive', 'rank' => 5]);
        Position::create(['name'=>'IT Executive', 'rank' => 3]);
        Position::create(['name'=>'Chief Executive Officer', 'rank' => 2]);
        Position::create(['name'=>'Managing Director','rank'=>1]);
    }
}
