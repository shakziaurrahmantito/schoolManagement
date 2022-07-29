<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class teachers_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("teachers")->insert([
            [
                "tea_name" => "Md. Ziaur Rahman",
                "tea_father" => "Md. Tara Mia",
                "tea_mother" => "Tusto Begum",
                "tea_email" => "shakziaurrahmantito@gmail.com",
                "tea_phone" => "01798659666",
                "tea_nid" => "2020231323133",
                "tea_address" => "Delua, Satuira, Manikganj",
                "tea_password" => md5("123456"),
                "tea_role" => 1,
                "tea_cla" => 1,
                "tea_img" => "public",
                "tea_status" => 1
            ],[
                "tea_name" => "Md. Jiya Rahman",
                "tea_father" => "Md. Tara Mia",
                "tea_mother" => "Tusto Begum",
                "tea_email" => "shakziaurrahmantito1@gmail.com",
                "tea_phone" => "01798659666",
                "tea_nid" => "2020231323133",
                "tea_address" => "Delua, Satuira, Manikganj",
                "tea_password" => md5("123456"),
                "tea_role" => 1,
                "tea_cla" => 1,
                "tea_img" => "public",
                "tea_status" => 1
            ]
        ]);    
    }
}

