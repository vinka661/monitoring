<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fdt extends Model
{
    public $table = "fdts";
    protected $fillable = ['root_couse', 'nama_fdt', 'jangka_panjang', 'target','no_wo','actual_finish','rkap_rjpu','upload_kajian','id_rcfa'];
    protected $primaryKey = 'fdt_id';

    public function Rcfa()
    {
        return $this->belongsTo('App\Rcfa', 'id_rcfa');
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