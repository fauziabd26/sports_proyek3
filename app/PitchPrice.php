<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PitchPrice extends Model
{
    protected $table = "pitch_price";
    protected $primaryKey = "pitch_id";
    protected $fillable = ['pitch_id', 'time_number','price'];
    public $timestamps = false;

    public function pitch()
    {
        return $this->belongsTo('App\Pitch', 'id');
    }
}
