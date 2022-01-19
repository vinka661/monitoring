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
            <h2 class="m-0 text-dark"><strong>Edit Progres </strong></h2></br>
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
            <form role="form" action="{{ route('updateProgres', $progres->progres_id) }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="progres_id"><strong>Progres ID<strong></label><br>
                    <input type="text" class="form-control" id="progres_id" name="progres_id" value="{{ $progres->progres_id }}">
                  </div>
                  <div class="form-group">
                    <label for="fdt"><strong>Nama FDT </strong></label>
                      <select class="form-control select2bs4" name="fdt" id="fdt" style="width: 100%;" required><br>
                      @foreach ($fdt as $item)
                        <option value="{{ $item->fdt_id }}" {{ $progres->id_fdt == $item->fdt_id ? 'selected' : '' }}>{{ $item->nama_fdt }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pic"><strong>Nama PIC</strong></label>
                    <select class="form-control select2bs4" name="pic" id="pic" style="width: 100%;" required><br>
                      @foreach ($pic as $item)
                        <option value="{{ $item->pic_id }}" {{ $progres->id_pic == $item->pic_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="keterangan"><strong>Progres<strong></label><br>
                    <select class="form-control select2bs4" name="keterangan" id="keterangan" style="width: 100%;" required></br>
                      <option value="Kajian">Kajian</option>
                      <option value="Prerencanaan">Prerencanaan</option>
                      <option value="Pengadaan">Pengadaan</option>
                      <option value="Eksekusi">Eksekusi</option>
                      <option value="Finish">Finish</option>
                      <option value="Kajian"        {{ $progres->keterangan == 'Kajian' ? 'selected' : '' }}>Kajian</option>
                      <option value="Prerencanaan"  {{ $progres->keterangan == 'Prerencanaan' ? 'selected' : '' }}>Prerencanaan</option>
                      <option value="Pengadaan"     {{ $progres->keterangan == 'Pengadaan' ? 'selected' : '' }}>Pengadaan</option>
                      <option value="Eksekusi"      {{ $progres->keterangan == 'Eksekusi' ? 'selected' : '' }}>Eksekusi</option>
                      <option value="Finish"        {{ $progres->keterangan == 'Finish' ? 'selected' : '' }}>Finish</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tanggal"><strong>Tanggal<strong></label><br>
                      <input type="date" class="form-control" required="required" name="tanggal" id="datepicker"  value="{{ $progres->tanggal }}">
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
@endsection