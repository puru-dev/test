<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table='counties';
    protected $fillable = [
        'county_name', 'state_initial','state_fullname'
    ];
}
