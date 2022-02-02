<?php

namespace App\Http\Controllers;
use App\Upload;
use App\Rcfa;
use Illuminate\Http\Request;

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
        request()->validate([
            'upload_kajian' => 'required',
            'upload_kajian.*' => 'mimes:doc,pdf,docx,txt,zip,jpeg,jpg,png'
        ]);
        if($request->hasfile('upload_kajian')) { 
            foreach($request->file('upload_kajian') as $upload_kajian)
            {
                $fileName = time().rand(0, 1000).pathinfo($upload_kajian->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'.'.$upload_kajian->getClientOriginalExtension();
                $upload_kajian->move(public_path(),$fileName);
                $input['file'] = $upload_kajian;
                
            }
            Upload::create([
                'id_rcfa' => $request->id_rcfa,
                'keterangan_kajian' => $request->keterangan_kajian,
                'upload_kajian' => $upload_kajian,
    
            ]);
        }
        
        //     Upload::create([
        //     'id_rcfa' => $request->id_rcfa,
        //     'keterangan_kajian' => $request->keterangan_kajian,
        //     'upload_kajian' => $upload_kajian,

        // ]);
    return redirect()->back();
                   
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
        if($upload->upload_kajian && file_exists(storage_path('app/public/' . $upload->upload_kajian)))
        {
            \Storage::delete('public/'.$upload->upload_kajian);
        }
        $upload_kajian = $request->file('upload_kajian')->store('files', 'public');
        $upload->upload_kajian = $upload_kajian;
        
        $upload->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $upload = Upload::find($id);
        $rcfa = Rcfa::all();
        $upload->delete();
        return redirect()->back();
    }
}
