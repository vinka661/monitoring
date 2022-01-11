<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public $table = "assets";
    protected $fillable = ['rbdid', 'equipment', 'area_id'];
    protected $primaryKey = 'asset_id';

    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id');
    }
}
