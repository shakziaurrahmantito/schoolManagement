<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    public $table = "classes";
    public $fillable = [
        "cla_name"
    ];
    public $timestamps = true;
    public $primaryKey = "cla_id";

}
