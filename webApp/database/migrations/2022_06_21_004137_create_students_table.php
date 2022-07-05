<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id("st_id");
            $table->string("st_name");
            $table->string("st_father");
            $table->string("st_mother");
            $table->string("st_g_phone");
            $table->string("st_address");
            $table->string("st_roll");
            $table->string("st_dath_of_birth");
            $table->string("birth_reg");
            $table->string("st_class");
            $table->string("st_img");
            $table->string("st_ger_img");
            $table->string("st_ger_nid");
            $table->string("st_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};


