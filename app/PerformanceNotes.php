<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceNotes extends Model
{
	    protected $fillable = [
        'noteDate',
        'note',
        'userId',

    ];
    public function Owner()
    {
        return $this->belongsTo(User::class, 'userOwner', 'id');
    }
    
    public function userAbout()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
