@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">DATA  FDT</h1>
                    <div class="card-deck">
                        @foreach ($pic as $key => $data)
                        <div class="card">
                          <img src="../img/fdt.png" class="card-img-top" alt="..."  width="50" height="200">
                          <div class="card-body bg-primary text-white">
                            <h5 class="card-title"><b>Nama FDT</b></h5>{{ ++$key }}.{{ $data->nama_fdt }}
                            <p class="card-text">Target : {{ $data->target }}</p>
                          </div>
                          <a href="{{ route('progresPic') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Progres</a>
                        </div>
                        @endforeach
                    </div>
            
            
                <!-- fotter -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection