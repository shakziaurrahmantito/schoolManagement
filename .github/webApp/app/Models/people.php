<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class people extends Model
{
    use HasFactory;
    public $table = "people";
    public $fillable = [
        'name'
    ];
    public $timestamps = true;
    public $primarykey = "id";
}
