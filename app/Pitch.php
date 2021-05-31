<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    protected $table = "pitch";
    public $primaryKey = "id";
    protected $fillable = ['name', 'id_sports', 'description','image', 'isactive', 'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
    public function sports()
    {
        return $this->belongsTo('App\Sports', 'id_sports');
    }
}
