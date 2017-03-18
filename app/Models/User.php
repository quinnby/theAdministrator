<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastName',
        'sinNumber',
        'primaryPhone',
        'address',
        'city',
        'province',
        'postalCode',
        'birthDate',
        'email',
        'hireDate',
        'titleId',
        'userTypeId',
        'departmentId',
        'password',
        'active'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function performanceNoteOwner()
    {
        return $this->hasMany('App\PerformanceNotes', "userOwner");
    }
    
    public function performanceNoteAbout()
    {
        return $this->hasMany('App\PerformanceNotes', 'userId');
    }
    
    public function userType()
    {
        return $this->belongsTo("App\UserType", 'userTypeId');
    }
    
    public function department()
    {
        return $this->belongsTo("App\Department", 'departmentId');
    }

    public function jobTitle()
    {
        return $this->belongsTo("App\JobTitle", 'titleId');
    }
    
    public function isOfType($type) 
    {
        return $this->userTypeId == $type;
    }
    
    public function bookedOff()
    {
        return $this->hasMany('App\TimeOff', 'userId');
    }
    
    public function approvedBookedOff()
    {
        return $this->hasMany('App\TimeOff', 'approvedById');
    }
  
    public function schedule()
    {
        return $this->hasMany('App\Schedule', 'userId');
    }
    
    public function createdSchedule()
    {
        return $this->hasMany('App\Schedule', 'createdBy');
    }

    public function tasks()
    {
        return $this->hasMany('App\tasks', 'userId');
    }
}