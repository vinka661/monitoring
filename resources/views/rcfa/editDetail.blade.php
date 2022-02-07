@extends('layout.master')
@section('konten')       
    <!-- Content Header (Page header) -->
    <section>
    <div class="container ">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <br>
            <h2 class="m-0 text-dark"><strong>Detail RCFA </strong></h2></br>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <form role="form" action="{{ route('updateDetilRcfa', $rcfa->rcfa_id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="evaluasi_rekom"><strong>Evaluasi Rekomendasi<strong></label><br>
                            <input type="text" class="form-control" id="evaluasi_rekom" name="evaluasi_rekom" placeholder="Masukkan Evaluasi Rekomendasi" value="{{ $rcfa->evaluasi_rekom }}">
                        </div>
                        <div class="form-group">
                            <label for="berulang_1_bln">Berulang 1 Bulan</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio mr-3">
                                    <input class="custom-control-input" type="radio" id="ya" name="berulang_1_bln" value="1" {{ $rcfa->berulang_1_bln == '1' ? 'checked' : ''}}>
                                    <label for="ya" class="custom-control-label">Ya</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tidak" name="berulang_1_bln" value="0"  {{ $rcfa->berulang_1_bln == '0' ? 'checked' : ''}}>
                                    <label for="tidak" class="custom-control-label">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berulang_3_bln">Berulang 3 Bulan</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio mr-3">
                                    <input class="custom-control-input" type="radio" id="ya1" name="berulang_3_bln" value="1" {{ $rcfa->berulang_3_bln == '1' ? 'checked' : ''}}>
                                    <label for="ya1" class="custom-control-label">Ya</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tidak1" name="berulang_3_bln" value="0" {{ $rcfa->berulang_3_bln == '0' ? 'checked' : ''}}>
                                    <label for="tidak1" class="custom-control-label">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berulang_6_bln">Berulang 6 Bulan</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio mr-3">
                                    <input class="custom-control-input" type="radio" id="ya2" name="berulang_6_bln" value="1" {{ $rcfa->berulang_6_bln == '1' ? 'checked' : ''}}>
                                    <label for="ya2" class="custom-control-label">Ya</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tidak2" name="berulang_6_bln" value="0" {{ $rcfa->berulang_6_bln == '0' ? 'checked' : ''}}>
                                    <label for="tidak2" class="custom-control-label">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berulang_1_th">Berulang 1 Tahun</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio mr-3">
                                    <input class="custom-control-input" type="radio" id="ya3" name="berulang_1_th" value="1" {{ $rcfa->berulang_1_th == '1' ? 'checked' : ''}}>
                                    <label for="ya3" class="custom-control-label">Ya</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tidak3" name="berulang_1_th" value="0" {{ $rcfa->berulang_1_th == '0' ? 'checked' : ''}}>
                                    <label for="tidak3" class="custom-control-label">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berulang_3_th">Berulang 3 Tahun</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio mr-3">
                                    <input class="custom-control-input" type="radio" id="ya4" name="berulang_3_th" value="1" {{ $rcfa->berulang_3_th == '1' ? 'checked' : ''}}>
                                    <label for="ya4" class="custom-control-label">Ya</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tidak4" name="berulang_3_th" value="0" {{ $rcfa->berulang_3_th == '0' ? 'checked' : ''}}>
                                    <label for="tidak4" class="custom-control-label">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('rcfa') }}" class="btn btn-default">Cancel</a>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>
</div>
</div>
@endsection