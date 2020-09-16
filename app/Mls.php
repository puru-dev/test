<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mls extends Model
{
    protected $table='mlses';
    protected $fillable = [
        'mls_name', 'state_initial','counties'
    ];
}
