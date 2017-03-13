<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
        protected $fillable = [
            'userId',
            'scheduleStart',
            'scheduleEnd'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId', 'id');
    }
    
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'createdBy', 'id');
        
    }
}
