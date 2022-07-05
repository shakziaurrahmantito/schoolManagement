<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    public $table = "teachers";
    public $fillable = [
        "tea_name",
        "tea_father",
        "tea_mother",
        "tea_email",
        "tea_phone",
        "tea_nid",
        "tea_address",
        "tea_password",
        "tea_role",
        "tea_cla",
        "tea_img",
        "tea_status"
    ];
    public $timestamps = true;
    public $primaryKey = "tea_id";

    public function getClass(){
        return $this->belongsTo(classes::class,"tea_cla");
    }


    public function getRole(){
        return $this->belongsTo(role::class,"tea_role");
    }
    
}
