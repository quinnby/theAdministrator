<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function performanceNoteOwner()
    {
        return $this->hasMany(PerformanceNotes::class, "userOwner");
    }
    
    public function performanceNoteAbout()
    {
        return $this->hasMany(PerformanceNotes::class, 'userId');
    }
    
    public function userType()
    {
        return $this->belongsTo(UserType::Class, 'userTypeId');
    }
}
