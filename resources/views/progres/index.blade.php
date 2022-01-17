@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA  PROGRES</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        {{-- <a href="{{ route('createRcfa') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama FDT</th>
                                            <th>Nama PIC</th>
                                            <th>Progres</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Hasil Kajian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($progres as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->id_fdt }}</td>
                                            <td>{{ $data->id_pic }}</td>
                                            <td>{{ $data->progres }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->keterangan}}</td>
                                            <td>{{ $data->upload_kajian}}</td>
                                          
                                            <td>
                                                <a href=""><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href=""><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                                              </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection