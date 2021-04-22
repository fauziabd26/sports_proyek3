<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olahraga extends Model
{
    protected $table = "olahraga";
    protected $primaryKey = "id_olahraga";
    protected $fillable = ['name_olahraga', 'image'];
}
