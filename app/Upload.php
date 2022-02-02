<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public $table = "uploads";
    protected $guarded = array();
    protected $fillable = ['keterangan_kajian', 'upload_kajian', 'id_rcfa', 'upload_id'];
    protected $primaryKey = 'upload_id';

    public function storeData($input)
    {
        return static::create($input);
    }
    

    public function  Rcfa()
    {
        return $this->belongsTo('App\Rcfa', 'id_rcfa');
    }
}
