<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FdtPic extends Model
{
    public $table = "fdts";
    protected $fillable = [ 'nama_fdt', 'target', 'id_rcfa'];
    protected $primaryKey = 'fdt_id';

    public function Rcfa()
    {
        return $this->belongsTo('App\Rcfa', 'id_rcfa');
    }

    public function Progres()
    {
        return $this->hasMany('App\Progres');
    }
}
