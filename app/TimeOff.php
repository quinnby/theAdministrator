<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class TimeOff extends Model
{
    protected $fillable = [
        'userId',
        'note',
        'approvedById',
        'startDate',
        'endDate',
        'approvedOn'

    ];
    public $timestamps = false;
    
    public function approvedBy()
    {
        return $this->belongsTo('App\Models\User', 'approvedById', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
        
    }

    public function getDaysOff($start, $end)
    {
        $createdAt =  new Carbon($start);
        $endsAt = new Carbon($end);
        return ($createdAt->diff($endsAt)->days <= 1) ? "Today" : $createdAt->diffForHumans($endsAt);
    }
} 
