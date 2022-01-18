@extends('halamanPic.layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA  FDT</h1>
                    <!-- DataTales Example -->
                    <!-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="{{ route('createRcfa') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama FDT</th>
                                            <th>Target</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fdtPic as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->nama_fdt }}</td>
                                            <td>{{ $data->target }}</td>
                                            <td>
                                                <a href=""><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Detail Progres</button></a>
                                              </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    @foreach($fdtPic as $key => $data)
            <div class="card" style="max-width: 540px;">
                <div class="row no-gutters">
		        <div class="col-md-4">
			    <img src="img/fdt1.png"  class="card-img" alt="...">
		    </div>
            <div class="col-md-8 bg-primary text-white">
			    <div class="card-body">
               
				<h5 class="card-title">Nama FDT</h5>{{ ++$key }}.{{ $data->nama_fdt }}
				<p class="card-text">Target : {{ $data->target }}</p>
				<a href="{{ route('fdtPic') }}" class="btn btn-primary">Detail FDT</a>
			</div>
		</div>
	</div>
    <br></br>
    @endforeach
    <br></br><br></br><br></br>

<!-- fotter -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection