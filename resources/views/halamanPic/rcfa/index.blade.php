@extends('halamanPic.layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA  RCFA</h1>
                    <!-- DataTales Example -->
                    
                        <!-- <div class="card-header py-3">
                        <a href="{{ route('createRcfa') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a> 
                        </div> -->
                        <!-- <div class="card-body"> -->
                            <!-- <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rcfaPic as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>
                                                <a href="{{ route('fdtPic') }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Detail FDT</button></a>
                                              </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> -->
                        <!-- </div> -->
                        @foreach($rcfaPic as $key => $data)
            <div class="card" style="max-width: 540px;">
                <div class="row no-gutters">
		        <div class="col-md-4">
			    <img src="img/rcfa.png"  class="card-img" alt="...">
		    </div>
            <div class="col-md-8 bg-primary text-white">
			    <div class="card-body">
               
				<h5 class="card-title">Judul Rcfa</h5>{{ ++$key }}.{{ $data->keterangan }}
				<p class="card-text">Tanggal : {{ $data->tanggal }}</p>
				<a href="{{ route('fdtPic') }}" class="btn btn-primary">Detail FDT</a>
			</div>
		</div>
	</div>
    @endforeach

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection