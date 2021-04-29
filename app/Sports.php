<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $table = "sports";
    protected $primaryKey = "id_sports";
    protected $fillable = ['name_sports', 'image_sports'];
}
