<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginInfo extends Model
{
    use HasFactory;

    public $table = "login_infos";
    public $fillable = [
        "name",
        "email",
        "user_ip",
        "browser"
    ];
    public $primaryKey = "id";
    public $timestamps = true;
}
