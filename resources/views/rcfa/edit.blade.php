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
            <h2 class="m-0 text-dark"><strong>Edit RCFA </strong></h2></br>
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
                <form role="form" action="{{ route('updateRcfa', $rcfa->rcfa_id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="rcfa_id"><strong>RCFA ID<strong></label><br>
                        <input type="text" class="form-control" id="rcfa_id" name="rcfa_id" value="{{ $rcfa->rcfa_id }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="aset"><strong>Aset Number</strong></label>
                        <select class="form-control select2bs4" name="aset" id="aset" style="width: 100%;">
                          @foreach ($aset as $item)
                            <option value="{{ $item->asset_id }}" {{ $rcfa->id_asset == $item->asset_id ? 'selected' : '' }}>{{ $item->asset_id }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="keterangan"><strong>Judul</strong></label><br>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $rcfa->keterangan }}">
                      </div>
                      <div class="form-group"> 
                        <label for="tanggal"><strong>Tanggal</strong></label>                 
                        <input type="date" class="form-control" required="required" id ="tanggal" name="tanggal" value="{{ $rcfa->tanggal }}"> 
                      </div>
                      <div class="form-group">
                        <label for="inp"><strong>Input<strong></label><br>
                        <select class="form-control select2bs4" name="inp" id="inp" style="width: 100%;" required></br>
                          <option value="PLO" {{ $rcfa->input == 'PLO' ? 'selected' : '' }}>PLO</option>
                          <option value="OEE" {{ $rcfa->input == 'OEE' ? 'selected' : '' }}>OEE</option>
                          <option value="ECP" {{ $rcfa->input == 'ECP' ? 'selected' : '' }}>ECP</option>
                          <option value="Chronic Problem" {{ $rcfa->input == 'Chronic Problem' ? 'selected' : '' }}>Chronic Problem</option>
                          <option value="Fail Freq" {{ $rcfa->input == 'Fail Freq' ? 'selected' : '' }}>Fail Freq</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="failure_mode"><strong>Failure Mode</strong></label></br>
                        <input type="text" class="form-control" id="failure_mode" name="failure_mode" value="{{ $rcfa->failure_mode }}">
                      </div>
                      <!-- <div class="form-group">
                        <label for="evaluasi_rekom"><strong>Evaluasi Rekomendasi</strong></label></br>
                        <input type="text" class="form-control" id="evaluasi_rekom" name="evaluasi_rekom" value="{{ $rcfa->evaluasi_rekom }}">
                      </div>
                      <div class="form-group">
                        <label for="berulang_1_bln">Berulang 1 Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="form-check form-check-inline">
                          <label for="berulang_1_bln">
                            <input type="radio" id="ya" name="berulang_1_bln" value="1" {{ $rcfa->berulang_1_bln == '1' ? 'checked' : ''}}> Ya &nbsp;&nbsp;
                            <input type="radio" id="tidak" name="berulang_1_bln" value="0" {{ $rcfa->berulang_1_bln == '0' ? 'checked' : ''}}> Tidak
                          </label>
                      </div>
                      <div class="form-group">
                        <label for="berulang_3_bln">Berulang 3 Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="form-check form-check-inline">
                          <label for="berulang_3_bln">
                            <input type="radio" id="ya" name="berulang_3_bln" value="1" {{ $rcfa->berulang_3_bln == '1' ? 'checked' : ''}}> Ya &nbsp;&nbsp;
                            <input type="radio" id="tidak" name="berulang_3_bln" value="0" {{ $rcfa->berulang_3_bln == '0' ? 'checked' : ''}}> Tidak
                          </label>
                      </div>
                      <div class="form-group">
                        <label for="berulang_6_bln">Berulang 6 Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="form-check form-check-inline">
                          <label for="berulang_6_bln">
                            <input type="radio" id="ya" name="berulang_6_bln" value="1" {{ $rcfa->berulang_6_bln == '1' ? 'checked' : ''}}> Ya &nbsp;&nbsp;
                            <input type="radio" id="tidak" name="berulang_6_bln" value="0" {{ $rcfa->berulang_6_bln == '0' ? 'checked' : ''}}> Tidak
                          </label>
                      </div>
                      <div class="form-group">
                        <label for="berulang_1_th">Berulang 1 Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="form-check form-check-inline">
                          <label for="berulang_1_th">
                            <input type="radio" id="ya" name="berulang_1_th" value="1" {{ $rcfa->berulang_1_th == '1' ? 'checked' : ''}}> Ya &nbsp;&nbsp;
                            <input type="radio" id="tidak" name="berulang_1_th" value="0" {{ $rcfa->berulang_1_th == '0' ? 'checked' : ''}}> Tidak
                          </label>
                      </div>
                      <div class="form-group">
                        <label for="berulang_3_th">Berulang 3 Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="form-check form-check-inline">
                          <label for="berulang_3_th">
                            <input type="radio" id="ya" name="berulang_3_th" value="1" {{ $rcfa->berulang_3_th == '1' ? 'checked' : ''}}> Ya &nbsp;&nbsp;
                            <input type="radio" id="tidak" name="berulang_3_th" value="0" {{ $rcfa->berulang_3_th == '0' ? 'checked' : ''}}> Tidak
                          </label>
                      </div> -->
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