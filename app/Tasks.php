<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
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

     public function getDaysLeft($start, $end)
    {
        $createdAt =  new DateTime($start);
        $endsAt = new DateTime($end);
        $diff = $endsAt->diff($createdAt)->format("%a");
        return ($diff < 1) ? "End of the day" : $diff . " day(s)";
    }
}
