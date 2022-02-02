<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rcfa extends Model
{
    public $table = "rcfas";
    protected $fillable = ['keterangan', 'tanggal', 'input', 'failure_mode','evaluasi_rekom', 'berulang_1_bln', 'berulang_3_bln', 'berulang_6_bln', 'berulang_1_th', 'berulang_3_th', 'id_asset'];
    protected $primaryKey = 'rcfa_id';

    public function aset()
    {
        return $this->belongsTo('App\Asset', 'id_asset');
    }

    public function Fdt()
    {
        return $this->hasMany('App\Fdt');
    }

    public function Upload()
    {
        return $this->hasMany('App\Upload');
    }
}
