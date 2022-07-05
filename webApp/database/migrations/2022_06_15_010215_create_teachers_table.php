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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id("tea_id");
            $table->string("tea_name");
            $table->string("tea_father");
            $table->string("tea_mother");
            $table->string("tea_email");
            $table->string("tea_phone");
            $table->string("tea_nid");
            $table->string("tea_address");
            $table->string("tea_password");
            $table->integer("tea_role");
            $table->integer("tea_cla");
            $table->string("tea_img");
            $table->string("tea_status");
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
        Schema::dropIfExists('teachers');
    }
};
