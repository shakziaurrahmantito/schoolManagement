<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public $table = "roles";
    public $fillable = [
        "role_name"
    ];
    public $timestamps = true;
    public $primaryKey = "role_id";
}
