<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RcfaPic extends Model
{
    public $table = "rcfas";
    protected $fillable = ['keterangan', 'tanggal', 'id_asset'];
    protected $primaryKey = 'rcfa_id';

    public function aset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }

    public function Fdt()
    {
        return $this->hasMany('App\Fdt');
    }
}
