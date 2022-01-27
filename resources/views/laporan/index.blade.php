@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA LAPORAN</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('cetakLaporan') }}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Data Laporan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Area</th>
                                            <th>Asset Number</th>
                                            <th>RBDID</th>
                                            <th>Equipment</th>
                                            <th>Judul RCFA</th>
                                            <th>Tanggal Kejadian</th>
                                            <th>Input</th>
                                            <th>Failure Mode</th>
                                            <th>Root Cause</th>
                                            <th>FDT</th>
                                            <th>PIC</th>
                                            <th>Jangka</th>
                                            <th>Target</th>
                                            <th>No Wo</th>
                                            <th>Actual Finish</th>
                                            <th>RKAP/RJPU</th>
                                            <th>Tanggal Progres</th>
                                            <th>Progres</th>
                                            <th>Evaluasi Rekomendasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laporan as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->nama_area }}</td>
                                            <td>{{ $data->asset_id }}</td>
                                            <td>{{ $data->rbdid }}</td>
                                            <td>{{ $data->equipment }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->input }}</td>
                                            <td>{{ $data->failure_mode }}</td>
                                            <td>{{ $data->root_cause }}</td>
                                            <td>{{ $data->nama_fdt }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->jangka }}</td>
                                            <td>{{ $data->target }}</td>
                                            <td>{{ $data->no_wo }}</td>
                                            <td>{{ $data->actual_finish }}</td>
                                            <td>{{ $data->rkap_rjpu }}</td>
                                            <td>{{ $data->tanggal_progres }}</td>
                                            <td>{{ $data->nama_progres }}</td>
                                            <td>{{ $data->evaluasi_rekom }}</td>
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