<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
    	'userId',
    	'taskName',
    	'taskDescription',
    	'date',

    ];

    public function Owner()
    {
        return $this->belongsTo('App\Models\User', 'userOwner', 'id');
    }
    
    public function userAbout()
    {
        return $this->belongsTo('App\Models\User', 'userId');
        
    }
}
