<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'first_name'=>'ahmed',
            'last_name'=>'manager',
            'phone'=>'01093951416',
            'email'=>'manager@manager.com',
            'password'=>'Password@1',
            'department_id'=>Department::first()?->id,
        ]);
    }
}
