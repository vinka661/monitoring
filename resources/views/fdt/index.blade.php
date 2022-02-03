@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA  FDT</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <a href="{{ route('createFdt') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a> -->
                            <a href="{{ route('cetakFdt') }}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Data FDT</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul RCFA</th>
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
                                            <td>{{ $data->rcfa->keterangan }}</td>
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