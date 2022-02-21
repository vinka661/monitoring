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
                                            <th>Equipment</th>
                                            <th>Judul RCFA</th>
                                            <th>Tanggal</th>
                                            <th>Input</th>
                                            <th>Failure Mode</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rcfa as $key => $data)
                                            @php
                                                $completedFdt = $data->fdt->every(function($fdt){
                                                    return $fdt->progres->count();
                                                });
                                            @endphp
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->aset->equipment }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->input }}</td>
                                            <td>{{ $data->failure_mode }}</td>
                                            <td>
                                                <a href="{{ route('editRcfa', $data->rcfa_id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteRcfa', $data->rcfa_id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                                                <a href="{{ route('detailFdt', $data->rcfa_id) }}"><button  class="btn btn-success btn-sm"><i class="fas fa-plus"></i> FDT</button></a>
                                                <a href="{{ route('upload', $data->rcfa_id) }}"><button  class="btn btn-success btn-sm"><i class="fas fa-file"></i> Upload File</button></a>
                                                {{-- @if($completedFdt)
                                                    <a href="#pesan" data-toggle="modal"><button  class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail RCFA</button></a>
                                                @else
                                                    <a href="#pesan" data-toggle="modal"><button  class="btn btn-primary btn-sm" disabled><i class="fas fa-eye"></i> Detail RCFA</button></a>
                                                @endif --}}
                                                @if($completedFdt)
                                                    <a href="{{ route('editDetilRcfa', $data->rcfa_id) }}" ><button  class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail RCFA</button></a>
                                                @else
                                                    <a href="{{ route('editDetilRcfa', $data->rcfa_id) }}"><button  class="btn btn-primary btn-sm" disabled><i class="fas fa-eye"></i> Detail RCFA</button></a>
                                                @endif
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
                
                <div class="modal fade" id="pesan" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Detail RCFA</h3>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="{{ route('editDetilRcfa', $data->rcfa_id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="evaluasi_rekom"><strong>Evaluasi Rekomendasi<strong></label><br>
                                            <input type="text" class="form-control" id="evaluasi_rekom" name="evaluasi_rekom" placeholder="Masukkan Evaluasi Rekomendasi" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="berulang_1_bln">Berulang 1 Bulan</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="ya" name="berulang_1_bln" value="1" required>
                                                    <label for="ya" class="custom-control-label">Ya</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="tidak" name="berulang_1_bln" value="0" required>
                                                    <label for="tidak" class="custom-control-label">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="berulang_3_bln">Berulang 3 Bulan</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="ya1" name="berulang_3_bln" value="1" required>
                                                    <label for="ya1" class="custom-control-label">Ya</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="tidak1" name="berulang_3_bln" value="0" required>
                                                    <label for="tidak1" class="custom-control-label">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="berulang_6_bln">Berulang 6 Bulan</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="ya2" name="berulang_6_bln" value="1" required>
                                                    <label for="ya2" class="custom-control-label">Ya</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="tidak2" name="berulang_6_bln" value="0" required>
                                                    <label for="tidak2" class="custom-control-label">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="berulang_1_th">Berulang 1 Tahun</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="ya3" name="berulang_1_th" value="1" required>
                                                    <label for="ya3" class="custom-control-label">Ya</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="tidak3" name="berulang_1_th" value="0" required>
                                                    <label for="tidak3" class="custom-control-label">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="berulang_3_th">Berulang 3 Tahun</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="ya4" name="berulang_3_th" value="1" required>
                                                    <label for="ya4" class="custom-control-label">Ya</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="tidak4" name="berulang_3_th" value="0" required>
                                                    <label for="tidak4" class="custom-control-label">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <button class="btn btn-primary mr-1" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                            {{-- <form method="POST" action="{{ route('updateDetilRcfa', $rcfa->rcfa_id) }}">
                                @csrf --}}
                                {{-- <input type="text" name="status" id="" value="1" hidden><br> --}}
                                {{-- <button type="submit" class="btn btn-icon btn-success"><i class="fas fa-check"></i> add data </button>
                            </div>
                            </form> --}}
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->
  @endsection