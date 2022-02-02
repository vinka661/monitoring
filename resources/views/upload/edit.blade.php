@extends('layout.master')
@section('konten')       
    <!-- Content Header (Page header) -->
    <section>
    <div class="container ">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <br>
            <h2 class="m-0 text-dark"><strong>Edit Upload</strong></h2></br>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <form role="form" action="{{ route('updateUpload', $upload->upload_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="upload_id"><strong>Upload ID<strong></label><br>
                        <input type="text" class="form-control" id="upload_id" name="upload_id" value="{{ $upload->upload_id }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="id_rcfa"><strong>Judul RCFA </strong></label>
                        <select class="form-control select2bs4" name="id_rcfa" id="id_rcfa" style="width: 100%;" ><br>
                          @foreach ($rcfa as $item)
                          <option value="{{ $item->rcfa_id }}" {{ $upload->id_rcfa == $item->rcfa_id ? 'selected' : '' }}>{{ $item->keterangan }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="keterangan_kajian"><strong>Keterangan Kajian<strong></label><br>
                          <textarea name="keterangan_kajian" id="keterangan_kajian" class="form-control"  value="{{ $upload->keterangan_kajian }}"></textarea>
                      </div>
                      <div class="form-group"> 
                        <label for="upload_kajian"><strong>Upload Kajian</strong></label>                 
                        <input type="file" class="form-control" required="required" name="upload_kajian" value="{{ $upload->upload_kajian }}"></br> 
                      </div> 
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="" class="btn btn-default">Cancel</a>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>
</div>
</div>
@endsection