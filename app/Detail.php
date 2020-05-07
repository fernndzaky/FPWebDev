<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['dp_url','name','genre_id','region_id','instrument_id','description','status_id'];
}
