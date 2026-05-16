<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['name','description', 'token', 'last_chek_date','certificate'])]

class Eqip extends Model
{
    public $timestamps = false;

    public function activeUsings() {
        return $this->hasMany(Using_eqip::class)->where('active',1);
    }
    public function usings() {
        return $this->hasMany(Using_eqip::class)->orderByDesc('id');
    }
}
