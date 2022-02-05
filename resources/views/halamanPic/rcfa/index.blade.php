@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA  RCFA</h1>
                    <!-- DataTales Example -->
                    <div class="card-deck">
                        @foreach ($pic as $key => $data)
                        @php
                            $id = str_replace('@mail.com', '', Auth::user()->email);;
                        @endphp
                        <div class="card">
                          <img src="../img/rcfa.png" class="card-img-top" alt="..." width="200" height="200">
                          <div class="card-body bg-primary text-white">
                            <h5 class="card-title"><b>Judul Rcfa</b></h5>{{ ++$key }}. {{ $data->keterangan }}
                            <p class="card-text">Tanggal : {{ $data->tanggal }}</p>
                          </div>
                          <a href="{{ url('pic_fdt/'. $data->rcfa_id . '/' . $id  ) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat FDT</a>
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection