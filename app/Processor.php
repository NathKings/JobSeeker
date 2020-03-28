<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    protected $table = 'processors';
    protected $fillable = ['id', 'processor_name'];

    public function jobs()
    {
        return $this->hasOne('App\Job');
    }
}
