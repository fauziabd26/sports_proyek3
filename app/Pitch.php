<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    protected $table = "pitch";
    protected $primaryKey = "id";
    protected $fillable = ['id_sports', 'description','image'];

    public function sports()
    {
        return $this->belongsTo('App\Sports', 'id');
    }
}
