<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
