<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function performanceNotes()
    {
        return $this->hasMany(PerformanceNotes::class);
    }
    
    public function userType()
    {
        return $this->belongsTo(UserType::Class, 'userTypeId');
    }
}
