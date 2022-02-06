<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fdt extends Model
{
    public $table = "fdts";
    protected $fillable = ['root_cause', 'nama_fdt', 'jangka', 'target','no_wo','actual_finish','rkap_rjpu', 'id_rcfa'];
    protected $primaryKey = 'fdt_id';

    public function Rcfa()
    {
        return $this->belongsTo('App\Rcfa', 'id_rcfa');
    }

    public function Progres()
    {
        return $this->hasMany('App\Progres','id_fdt');
    }
   
}