<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Andreas',
            'email' => 'andreas@mail.com',
            'password' => bcrypt('andreas2905'),
            'gender' => 'male',
            'date_of_birth' => '2002-09-02',
            'address' => 'Kemangguisan street',
            'user_role_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Alexander',
            'email' => 'alexander@mail.com',
            'password' => bcrypt('alexander2905'),
            'gender' => 'male',
            'date_of_birth' => '2002-09-01',
            'address' => 'Alam Sutera street',
            'user_role_id' => 2
        ]);
    }
}
