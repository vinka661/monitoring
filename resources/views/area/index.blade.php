@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA AREA</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('createArea') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
                            <a href="{{ route('cetakArea') }}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Data Area</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Area</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($area as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>
                                                <a href="{{ route('editArea', $data->area_id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteArea', $data->area_id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
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