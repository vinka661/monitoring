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
            <h2 class="m-0 text-dark"><strong>Tambah RCFA Baru</strong></h2></br>
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
              <form role="form" action="{{ route('storeRcfa') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="aset"><strong>Aset Number</strong></label>
                    <select class="form-control select2bs4" name="aset" id="aset" style="width: 100%;" required><br>
                      @foreach ($aset as $item)
                        <option value="{{ $item->asset_id }}">{{ $item->asset_id }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="keterangan"><strong>Judul<strong></label><br>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" required>
                  </div>
                  <div class="form-group">
                    <label for="tanggal"><strong>Tanggal<strong></label><br>
                      <input type="date" class="form-control" required="required" name="tanggal" id="datepicker" placeholder="Masukkan Tanggal Sewa">
                  </div>
                  <div class="form-group">
                    <label for="inp"><strong>Input<strong></label><br>
                    <select class="form-control select2bs4" name="inp" id="inp" style="width: 100%;" required>
                      <option value="PLO">PLO</option>
                      <option value="OEE">OEE</option>
                      <option value="ECP">ECP</option>
                      <option value="Chronic Problem">Chronic Problem</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="failure_mode"><strong>Failure Mode<strong></label><br>
                    <input type="text" class="form-control" id="failure_mode" name="failure_mode" placeholder="Masukkan Failure Mode" required>
                  </div>
                  <div class="form-group">
                    <label for="evaluasi_rekom"><strong>Evaluasi Rekomendasi<strong></label><br>
                    <input type="text" class="form-control" id="evaluasi_rekom" name="evaluasi_rekom" placeholder="Masukkan Evaluasi Rekomendasi" required>
                  </div>
                  <div class="form-group">
                    <label for="berulang_1_bln">Berulang 1 Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <div class="form-check form-check-inline">
                          <label for="berulang_1_bln">
                            <input type="radio" id="ya" name="berulang_1_bln" value="1" required> Ya &nbsp;&nbsp;
                            <input type="radio" id="tidak" name="berulang_1_bln" value="0" required>> Tidak
                          </label>
                  </div>
                  <div class="form-group">
                    <label for="berulang_3_bln">Berulang 3 Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <div class="form-check form-check-inline">
                          <label for="berulang_3_bln">
                            <input type="radio" id="berulang_3_bln" name="berulang_3_bln" value="1"> Ya &nbsp;&nbsp;
                            <input type="radio" id="berulang_3_bln" name="berulang_3_bln" value="0"> Tidak
                          </label>
                  </div>
                  <div class="form-group">
                    <label for="berulang_6_bln">Berulang 6 Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <div class="form-check form-check-inline">
                          <label for="berulang_6_bln">
                            <input type="radio" id="berulang_6_bln" name="berulang_6_bln" value=1> Ya &nbsp;&nbsp;
                            <input type="radio" id="berulang_6_bln" name="berulang_6_bln" value=0> Tidak
                          </label>
                  </div>
                  <div class="form-group">
                    <label for="berulang_1_th">Berulang 1 Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <div class="form-check form-check-inline">
                          <label for="berulang_1_th">
                            <input type="radio" id="berulang_1_th" name="berulang_1_th" value="1"> Ya &nbsp;&nbsp;
                            <input type="radio" id="berulang_1_th" name="berulang_1_th" value="0"> Tidak
                          </label>
                  </div>
                  <div class="form-group">
                    <label for="berulang_3_th">Berulang 3 Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <div class="form-check form-check-inline">
                          <label for="berulang_3_th">
                            <input type="radio" id="berulang_3_th" name="berulang_3_th" value="1"> Ya &nbsp;&nbsp;
                            <input type="radio" id="berulang_3_th" name="berulang_3_th" value="0"> Tidak
                          </label>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
$(function() {
    $( "#datepicker" ).datepicker({
        format: "y-m-d"
    });
});
  </script>
@endsection
