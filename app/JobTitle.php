<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $fillable = [
            'title'
    ];
    
    public $timestamps = false;
    
    public function users()
    {
    	return $this->hasMany('App\Models\User','titleId');
    }
}
