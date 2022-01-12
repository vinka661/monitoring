<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public $table = "assets";
    protected $fillable = ['rbdid', 'equipment', 'id_area', 'asset_id'];
    protected $primaryKey = 'asset_id';
    public $incrementing = false;

    public function area()
    {
        return $this->belongsTo('App\Area', 'id_area');
    }

    public function rcfa()
    {
        return $this->hasMany('App\Rcfa');
    }
}
