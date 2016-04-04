<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['body'];

    public function todo() 
    {
    	return $this->belongsTo('\App\Todo');
    }
}
