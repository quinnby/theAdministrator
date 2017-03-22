<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $fillable = [
            'department',
            'description'
    ];
    
    public function users()
    {
        return $this->hasMany('App\Models\User', 'id');
    }
}
