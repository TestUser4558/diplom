<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['x','y', 'datetime', 'eqip_id'])]

class Coords extends Model
{
    public $timestamps = false;
    protected $table = 'eqip_coords';
}
