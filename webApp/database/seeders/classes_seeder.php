<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class classes_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("classes")->insert([
            [
                "cla_name" => "Six",
                "cla_status" => 1
            ],[
                "cla_name" => "Seven",
                "cla_status" => 1
            ],[
                "cla_name" => "Eight",
                "cla_status" => 1
            ],[
                "cla_name" => "Nine",
                "cla_status" => 1
            ],[
                "cla_name" => "Ten",
                "cla_status" => 1
            ]
        ]);
        
    }
}
