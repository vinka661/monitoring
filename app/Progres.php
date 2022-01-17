<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    public $table = "rcfas";
    protected $fillable = ['progres', 'tanggal', 'keterangan', 'upload_kajian','id_fdt','id_pic'];
    public $incrementing = false;

    public function Fdt()
    {
        return $this->belongsTo('App\Fdt', 'id_fdt');
    }

    public function Pic()
    {
        return $this->belongsTo('App\Pic', 'id_pic');
    }

    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "assets/files/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result =url('assets/files').'/'.$tmp_file_name;
            // }
        return $result;
     }

    
}
