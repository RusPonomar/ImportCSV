<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['first', 'last', 'email'];

    /**
     * Get all of the posts for the user.
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}

