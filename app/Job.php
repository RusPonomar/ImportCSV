<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['candidate_id', 'position', 'company', 'start_at', 'end_at'];
}
