<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    public $table = "pics";
    protected $fillable = ['nid', 'nama', 'password', 'bidang', 'fungsi', 'level'];
    protected $primaryKey = 'pic_id';

    public function Progres()
    {
        return $this->hasMany('App\Progres');
    }
}


