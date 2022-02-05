<?php

namespace App\Http\Controllers;
use App\Upload;
use App\Rcfa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class uploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Rcfa $rcfa)
    {
         $upload = Upload::all();
        return view('upload.create', ['rcfa' => $rcfa]);
    }

    // public function store(Request $request)
    // {
    //     if($request->file('upload_kajian')){ 
	// 	    $upload_kajian = $request->file('upload_kajian')->store('files','public');
    //     }
    //     Upload::create([
    //         'id_rcfa' => $request->id_rcfa,
    //         'keterangan_kajian' => $request->keterangan_kajian,
    //         'upload_kajian' => $upload_kajian,

    //     ]);
    // return redirect()->back();
    // }

    public function store(Request $request)
    {
       $upload_kajian= new Upload();
       $this->validate($request, [
                'upload_kajian' => 'required',
                'upload_kajian.*' => 'mimes:doc,pdf,docx,zip,ppt,pptx'
        ]);
        if($request->hasfile('upload_kajian'))
         {
            $file = $request->file('upload_kajian');
            $name = $file->getClientOriginalName();
          
            $folder = '/public/files/';
            $path = $folder.$name;
            $file->storeAs('public/files',$name);
            $upload_kajian->upload_kajian = $path;
         }
         $upload_kajian->id_rcfa = $request->id_rcfa;
         $upload_kajian->keterangan_kajian = $request->keterangan_kajian;
         $upload_kajian->save();
        return redirect()->route('upload', ['rcfa_id' => $request->id_rcfa])->with('success','Data Berhasil Ditambahkan');
    }

    // public function store(Request $request)
    // {


    //     $this->validate($request, [
    //             'upload_kajian' => 'required',
    //             'upload_kajian.*' => 'mimes:doc,pdf,docx,zip'
    //     ]);


    //     if($request->hasfile('upload_kajian'))
    //      {
    //         foreach($request->file('upload_kajian') as $upload_kajian)
    //         {
    //             $name = time().'.'.$upload_kajian->extension();
    //             $upload_kajian->move(public_path().'/files/', $name);  
    //             $data[] = $name;  
    //         }
    //      }


    //      $upload_kajian->upload_kajian=json_encode($data);
    //              Upload::create([
    //         'id_rcfa' => $request->id_rcfa,
    //         'keterangan_kajian' => $request->keterangan_kajian,
    //         'upload_kajian' => $upload_kajian,

    //     ]);
    // return redirect()->back(); 
    // }

    public function edit($upload_id)
    {
        $upload = Upload::find($upload_id);
        $rcfa = Rcfa::all();
        return view('upload.edit', ['upload' => $upload, 'rcfa' => $rcfa]);
    }

    public function update(Request $request, $upload_id)
    {
        $upload = Upload::find($upload_id);
        $upload->id_rcfa = $request->id_rcfa;
        $upload->keterangan_kajian = $request->keterangan_kajian;
        if($upload->upload_kajian && file_exists(storage_path('/public/files/' . $upload->upload_kajian)))
        {
            \Storage::delete('/public/files/'.$upload->upload_kajian);
        }
        if($request->hasfile('upload_kajian'))
         {
            $file = $request->file('upload_kajian');
            $name = $file->getClientOriginalName();
          
            $folder = '/public/files/';
            $path = $folder.$name;
            $file->storeAs('public/files',$name);
            $upload->upload_kajian = $path;
         }
        // $upload_kajian = $request->file('upload_kajian')->store('files', 'public');
        
        // $upload->upload_kajian = $upload_kajian;
        
        $upload->save();
        return redirect()->route('upload', ['rcfa_id' => $request->id_rcfa])->with('success','Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $upload = Upload::find($id);
        $rcfa = Rcfa::all();
        $upload->delete();
        return redirect()->route('upload', ['rcfa_id' => $upload->id_rcfa])->with('success','Data Berhasil Dihapus');
    }

    public function download($id)
    {
        $upload = Upload::find($id);

        return Storage::download($upload->upload_kajian);
    }
}
