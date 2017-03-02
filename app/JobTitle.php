<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    public function users()
    {
    	return $this->hasMany('App\Models\User','titleId');
    }
}
