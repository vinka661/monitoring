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
            <h2 class="m-0 text-dark"><strong>Tambah Progres Baru</strong></h2></br>
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
                <form role="form" action="{{ route('storeProgres') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="fdt"><strong>Nama FDT </strong></label>
                      <select class="form-control select2bs4" name="fdt" id="fdt" style="width: 100%;" required><br>
                      @foreach ($fdt as $item)
                        <option value="{{ $item->fdt_id }}">{{ $item->nama_fdt}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pic"><strong>Nama PIC</strong></label>
                    <select class="form-control select2bs4" name="pic" id="pic" style="width: 100%;" required><br>
                      @foreach ($pic as $item)
                        <option value="{{ $item->pic_id }}">{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama_progres"><strong>Progres<strong></label><br>
                    <select class="form-control select2bs4" name="nama_progres" id="nama_progres" style="width: 100%;" required></br>
                      <option value="Kajian">Kajian</option>
                      <option value="Prerencanaan">Prerencanaan</option>
                      <option value="Pengadaan">Pengadaan</option>
                      <option value="Eksekusi">Eksekusi</option>
                      <option value="Finish">Finish</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_progres"><strong>Tanggal<strong></label><br>
                      <input type="date" class="form-control" required="required" name="tanggal_progres" id="datepicker" placeholder="Masukkan Tanggal Progres">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('progres') }}" class="btn btn-default">Cancel</a>
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
