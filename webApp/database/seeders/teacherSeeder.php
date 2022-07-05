<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\teacher;
use Faker\Factory;

class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fa = Factory::create();
       $tea = new teacher();
       $tea->tea_name = "Md. Ziaur Rahman";
       $tea->tea_father = "Test";
       $tea->tea_mother = "Test";
       $tea->tea_email = "shakziaurrahmantito@gmail.com";
       $tea->tea_phone = "01798659666";
       $tea->tea_nid = "1212121233";
       $tea->tea_address = "Delua/Saturia/Mankiganj.";
       $tea->tea_password = md5("123456");
       $tea->tea_role = "1";
       $tea->tea_cla = "1";
       $tea->tea_img = "1";
       $tea->tea_status = 1;
       $tea->save();
    }
}
