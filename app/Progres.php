<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    public $table = "progress";
    protected $fillable = ['tanggal_progres', 'nama_progres', 'ket_progres', 'tanggal_target', 'status', 'id_fdt', 'id_pic'];
    // public $incrementing = false;
    protected $primaryKey = 'progres_id';

    public function Fdt()
    {
        return $this->belongsTo('App\Fdt', 'id_fdt');
    }

    public function Pic()
    {
        return $this->belongsTo('App\Pic', 'id_pic');
    }

    
}
