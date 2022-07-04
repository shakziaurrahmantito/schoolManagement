<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    public $table = "students";
    public $fillable = [
        "st_name",
        "st_father",
        "st_mother",
        "st_g_phone",
        "st_address",
        "st_roll",
        "st_dath_of_birth",
        "birth_reg",
        "st_class",
        "st_img",
        "st_ger_img",
        "st_ger_nid",
        "st_status"
    ];
    public $timestamps = true;
    public $primaryKey = "st_id";

    public function getClass(){
        return $this->belongsTo(classes::class,"st_class");
    }
}

