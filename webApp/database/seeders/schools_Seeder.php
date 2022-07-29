<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class schools_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("schools")->insert(
            [
                "name" => "Our School Name",
                "email" => "test@gmail.com",
                "phone" => "01798659666",
                "address" => "Dhaka, Bangladesh",
                "establish_name" => "Test",
                "establish_date" => "2022-10-1",
                "logu" => "public"
            ]
        );
    }
}
