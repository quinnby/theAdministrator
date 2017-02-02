<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceNotes extends Model
{
    public function userOwner()
    {
        return $this->belongsTo(User::class, 'userOwner');
    }
    
    public function userAbout()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
