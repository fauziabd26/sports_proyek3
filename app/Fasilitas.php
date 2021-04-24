<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = "fasilitas";
    protected $primaryKey = "id_fasilitas";
    protected $fillable = ['id_olahraga', 'fasilitas'];

    public function olahraga()
    {
        return $this->belongsTo('App\Olahraga', 'id_olahraga');
    }
}
