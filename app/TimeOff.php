<?php

namespace App;
use Carbon\Carbon;
use DateTime;
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
        $createdAt =  new DateTime($start);
        $endsAt = new DateTime($end);
        $diff = $endsAt->diff($createdAt)->format("%a");
        $diff = $diff + 1; 
        if($diff > 0)
            return $diff . " day(s)";
        else
            return 'Time Passed';
    }
} 
