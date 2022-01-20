@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA  RCFA</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('createRcfa') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
                            <a href="{{ route('cetakRcfa') }}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Data RCFA</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Asset Number</th>
                                            <th>Judul RCFA</th>
                                            <th>Tanggal</th>
                                            <th>Input</th>
                                            <th>Failure Mode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rcfa as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->aset->asset_id }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->input }}</td>
                                            <td>{{ $data->failure_mode }}</td>
                                            <td>
                                                <a href="{{ route('editRcfa', $data->rcfa_id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteRcfa', $data->rcfa_id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                                                <a href="{{ route('editDetail', $data->rcfa_id) }}"><button  class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah FDT</button></a>
                                                <a href=""><button  class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail RCFA</button></a>
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