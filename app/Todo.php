<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'description', 'completed'];

    protected $dates = ['created_at'];

    // public function getCreatedAtAttribute($value) 
    // {
    // 	return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    // }

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function notes() 
    {
    	return $this->hasMany(Note::class);
    }
}
