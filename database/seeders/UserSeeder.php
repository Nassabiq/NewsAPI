<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'CCnC a.k.a Quinn',
                'email' => 'ccnc@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 1,
            ],
            [
                'name' => 'Dira Cahyo',
                'email' => 'chyo@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 2,
            ],
        ]);
    }
}
