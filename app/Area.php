<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table = "areas";
    protected $fillable = ['nama_area'];
    protected $primaryKey = 'area_id';

    public function asset()
    {
        return $this->hasMany('App\Asset');
    }
}
