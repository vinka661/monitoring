@extends('layout.master')
@section('konten')
<!-- Content Header (Page header) -->
<section>
    <div class="container ">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark"><strong>FDT</strong></h2></br>
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
                        <div class="form-group">
                            <label for="aset"><strong>Aset Number</strong></label>
                            <select class="form-control select2bs4" name="aset" id="aset" style="width: 100%;" disabled>
                            @foreach ($aset as $item)
                                <option value="{{ $item->asset_id }}" {{ $rcfa->id_asset == $item->asset_id ? 'selected' : '' }}>{{ $item->asset_id }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group"> 
                            <label for="tanggal"><strong>Tanggal</strong></label>                 
                            <input type="date" class="form-control" required="required" id ="tanggal" name="tanggal" value="{{ $rcfa->tanggal }}" disabled> 
                        </div>
                </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <br>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Detail FDT</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('createFdt', ['rcfa' => $rcfa->rcfa_id]) }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah FDT</button></a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Root Cause</th>
                                <th>Nama FDT</th>
                                <th>Jangka</th>
                                <th>Target</th>
                                <th>No Wo</th>
                                <th>Actual Finish</th>
                                <th>RKAP/RJPU</th>
                                {{-- <th>Upload Kajian</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fdt as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->root_cause }}</td>
                                <td>{{ $data->nama_fdt }}</td>
                                <td>{{ $data->jangka }}</td>
                                <td>{{ $data->target }}</td>
                                <td>{{ $data->no_wo }}</td>
                                <td>{{ $data->actual_finish}}</td>
                                <td>{{ $data->rkap_rjpu}}</td>
                                {{-- <td>{{ $data->upload_kajian}}</td> --}}
                                <td>
                                    <a href="{{ route('editFdt', $data->fdt_id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                    <a href="{{ route('deleteFdt', $data->fdt_id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                                    <a href="{{ route('detailProgres', $data->fdt_id) }}"><button  class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Progres</button></a>
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