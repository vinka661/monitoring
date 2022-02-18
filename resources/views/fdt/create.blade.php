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
            <h2 class="m-0 text-dark"><strong>Tambah FDT</strong></h2></br>
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
              <form role="form" action="{{ route('storeFdt') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_rcfa" value="{{ $rcfa->rcfa_id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="root_cause"><strong>Root Cause<strong></label><br>
                    <input type="text" class="form-control" id="root_cause" name="root_cause" placeholder="Masukkan Root Cause" required>
                  </div>
                  <div class="form-group">
                    <label for="nama_fdt"><strong>Nama FDT<strong></label><br>
                    <input type="text" class="form-control" id="nama_fdt" name="nama_fdt" placeholder="Masukkan Nama Fdt" required>
                  </div>
                  <div class="form-group">
                    <label for="jangka"><strong>Jangka<strong></label><br>
                    <select class="form-control select2bs4" name="jangka" id="jangka" style="width: 100%;" required></br>
                      <option value="Jangka Panjang">Jangka Panjang</option>
                      <option value="Jangka Pendek">Jangka Pendek</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="target"><strong>Target<strong></label><br>
                      <input type="date" class="form-control" name="target" id="datepicker" placeholder="Masukkan Tanggal Target">
                  </div>
                  <div class="form-group">
                    <label for="no_wo"><strong>No Wo<strong></label><br>
                    <input type="text" class="form-control" id="no_wo" name="no_wo" placeholder="Masukkan No Wo" required>
                  </div>
                  <div class="form-group">
                    <label for="actual_finish"><strong>Actual Finish<strong></label><br>
                      <input type="date" class="form-control" name="actual_finish" id="datepicker" placeholder="Masukkan Tanggal Actual Finish">
                  </div>
                  <div class="form-group">
                    <label for="rkap_rjpu"><strong>RKAP/RJPU<strong></label><br>
                    <input type="text" class="form-control" id="rkap_rjpu" name="rkap_rjpu" placeholder="Masukkan RKAP/RJPU" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('detailFdt', $rcfa->rcfa_id) }}" class="btn btn-default">Cancel</a>
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