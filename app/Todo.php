<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'description', 'completed'];

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
