@extends('layout.master')
@section('konten')
<!-- Content Header (Page header) -->
<section>
    <div class="container ">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark"><strong>Upload Kajian</strong></h2></br>
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
                <form role="form" action="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="keterangan"><strong>Judul</strong></label><br>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $rcfa->keterangan }}" disabled>
                        </div>
                </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <br>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Detail Upload</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('createUpload', ['rcfa' => $rcfa->rcfa_id]) }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Upload Kajian</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>File Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upload as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->keterangan_kajian }}</td>
                                <td><a href="{{ route('downloadFile', $data->upload_id) }}">{{ $data->upload_kajian }}</a></td>
                                <td>
                                    <a href="{{ route('editUpload', $data->upload_id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                    <a href="{{ route('deleteUpload', $data->upload_id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection