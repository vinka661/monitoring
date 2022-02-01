@extends('layout.master')
@section('konten')
<!-- Content Header (Page header) -->
<section>
    <div class="container ">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark"><strong>Progres</strong></h2></br>
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
                            <label for="nama_fdt"><strong>Nama FDT</strong></label><br>
                            <input type="text" class="form-control" id="nama_fdt" name="nama_fdt" value="{{ $fdt->nama_fdt }}" disabled>
                        </div>
                        <div class="form-group"> 
                            <label for="target"><strong>Target</strong></label>                 
                            <input type="date" class="form-control" required="required" id ="target" name="target" value="{{ $fdt->target }}" disabled> 
                        </div>
                        <div class="form-group"> 
                            <label for="actual_finish"><strong>Actual Finish</strong></label>                 
                            <input type="date" class="form-control" required="required" id ="actual_finish" name="actual_finish" value="{{ $fdt->actual_finish }}" disabled> 
                        </div>
                </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <br>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Detail Progres</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('createProgres', ['fdt' => $fdt->fdt_id]) }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Progres</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama PIC</th>
                                <th>Progres</th>
                                <th>Tanggal Progres</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($progres as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->pic->nama }}</td>
                                <td>{{ $data->nama_progres }}</td>
                                <td>{{ $data->tanggal_progres }}</td>
                                <td>
                                    <a href="{{ route('editProgres', $data->progres_id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                    <a href="{{ route('deleteProgres', $data->progres_id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
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