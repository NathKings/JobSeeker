<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobstable';
    protected $fillable = ['state','priority','processor_id, submitter_id','description','name'];
}
