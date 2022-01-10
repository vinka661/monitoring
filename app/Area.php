<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table = "areas";
    protected $fillable = ['nama'];
}
