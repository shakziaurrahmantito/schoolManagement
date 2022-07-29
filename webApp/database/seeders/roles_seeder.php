<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roles_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            [
                "role_name" => "Head Master",
                "role_status" => 1
            ],[
                "role_name" => "Class Teacher",
                "role_status" => 1
            ]
        ]);
    }
}
