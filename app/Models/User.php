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
        'password'
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
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentId');
    }
    
    public function isOfType($type) 
    {
        return $this->userTypeId == $type;
    }
  

}