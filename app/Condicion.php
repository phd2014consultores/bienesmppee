<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    protected $table = "condicion";

    protected $fillable = [
        'id','nombre',
    ];

}
