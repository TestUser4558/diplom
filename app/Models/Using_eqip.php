<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id','eqip_id', 'date_start', 'date_end','active'])]

class Using_eqip extends Model
{
    public $timestamps = false;
    protected $table = 'using_eqip';

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function eqip() {
        return $this->belongsTo(Eqip::class);
    }
    public function coords() {
        return $this->hasMany(Coords::class, 'eqip_id', 'id');
    }
}
