<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    use HasFactory;

    public $table = "schools";
    public $fillable = [
        "name",
        "email",
        "phone",
        "address",
        "establish_name",
        "establish_date",
        "logu"
    ];
    public $timestamps = true;
    public $primarykey = "id";

}
