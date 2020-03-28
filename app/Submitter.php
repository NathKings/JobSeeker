<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submitter extends Model
{
    protected $table = 'submitters';
    protected $fillable = ['id', 'submitter_name'];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
