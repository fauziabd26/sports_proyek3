<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = "fasilitas";
    protected $primaryKey = "id_fasilitas";
    protected $fillable = ['name', 'fasilitas', 'id_olahraga', 'alamat', 'kota', 'image'];

    public function olahraga()
    {
        return $this->belongsTo('App\Olahraga', 'id_olahraga');
    }
}
