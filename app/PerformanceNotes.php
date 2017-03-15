<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceNotes extends Model
{
	    protected $fillable = [
            'userId',
            'noteDate',
            'note'
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
