<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = "mitra";
    protected $primaryKey = "id_mitra";
    protected $fillable = ['id_mitra', 'id_user','nama_mitra','fasilitas','alamat','kota','foto_mitra'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

}
