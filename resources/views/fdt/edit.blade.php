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
            <h2 class="m-0 text-dark"><strong>Edit FDT </strong></h2></br>
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
                <form role="form" action="{{ route('updateFdt', $fdt->fdt_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="fdt_id"><strong>FDT ID<strong></label><br>
                        <input type="text" class="form-control" id="fdt_id" name="fdt_id" value="{{ $fdt->fdt_id }}" disabled>
                      </div>
                     
                      <div class="form-group">
                        <label for="id_rcfa"><strong>Judul RCFA </strong></label>
                        <select class="form-control select2bs4" name="id_rcfa" id="id_rcfa" style="width: 100%;" ><br>
                          @foreach ($rcfa as $item)
                          <option value="{{ $item->rcfa_id }}" {{ $fdt->id_rcfa == $item->rcfa_id ? 'selected' : '' }}>{{ $item->keterangan }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="root_cause"><strong>Root Cause<strong></label><br>
                        <input type="text" class="form-control" id="root_cause" name="root_cause" value="{{ $fdt->root_cause }}" >
                      </div>
                      <div class="form-group">
                        <label for="nama_fdt"><strong>Nama FDT<strong></label><br>
                        <input type="text" class="form-control" id="nama_fdt" name="nama_fdt" value="{{ $fdt->nama_fdt }}" >
                      </div>
                      <div class="form-group">
                        <label for="jangka"><strong>Jangka<strong></label><br>
                        <select class="form-control select2bs4" name="jangka" id="jangka" style="width: 100%;" required></br>
                          <option value="Jangka Panjang" {{ $fdt->jangka == 'Jangka Panjang' ? 'selected' : '' }}>Jangka Panjang</option>
                          <option value="Jangka Pendek" {{ $fdt->jangka == 'Jangka Pendek' ? 'selected' : '' }}>Jangka Pendek</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="target"><strong>Target<strong></label><br>
                          <input type="date" class="form-control" required="required" name="target" id="datepicker" value="{{ $fdt->target}}">
                      </div>
                      <div class="form-group">
                        <label for="no_wo"><strong>No Wo<strong></label><br>
                        <input type="text" class="form-control" id="no_wo" name="no_wo" value="{{ $fdt->no_wo}}">
                      </div>
                      <div class="form-group">
                        <label for="actual_finish"><strong>Actual Finish<strong></label><br>
                          <input type="date" class="form-control" required="required" name="actual_finish" id="datepicker" value="{{ $fdt->actual_finish}}">
                      </div>
                      <div class="form-group">
                        <label for="rkap_rjpu"><strong>RKAP/RJPU<strong></label><br>
                        <input type="text" class="form-control" id="rkap_rjpu" name="rkap_rjpu" value="{{ $fdt->rkap_rjpu}}">
                      </div>
                      <div class="form-group"> 
                        <label for="upload_kajian"><strong>Upload Kajian</strong></label>                 
                        <input type="file" class="form-control" required="required" name="upload_kajian" value="{{ $fdt->upload_kajian }}"></br> 
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('fdt') }}" class="btn btn-default">Cancel</a>
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