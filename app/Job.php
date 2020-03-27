<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobstable';
    protected $fillable = ['priority','description','name','state','processor_id', 'submitter_id'];

    public function processor()
    {
        return $this->belongsTo('App\Processor');
    }

    public function submitter()
    {
        return $this->belongsTo('App\Submitter');
    }
}
