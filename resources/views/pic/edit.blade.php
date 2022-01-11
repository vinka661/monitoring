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
            <h2 class="m-0 text-dark"><strong>Edit Pic</strong></h2></br>
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
                <form role="form" action="{{ route('updatePic', $pic->pic_id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="id"><strong>Id PIC</strong></label><br>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $pic->pic_id }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="nid"><strong>NID</strong></label><br>
                        <input type="text" class="form-control" id="nid" name="nid" value="{{ $pic->nid }}">
                      </div>
                      <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label><br>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pic->nama }}">
                      </div>
                      <div class="form-group">
                        <label for="password"><strong>Password</strong></label><br>
                        <input type="text" class="form-control" id="password" name="password" value="{{ $pic->password }}">
                      </div>
                 
                    <div class="form-group">
                      <label for="bidang"><strong>Bidang<strong></label><br>
                      <select class="form-control select2bs4" name="bidang" id="bidang" style="width: 100%;" required></br>
                        <option value="Operasi" {{ $pic->bidang == 'Operasi' ? 'selected' : '' }}>Operasi</option>
                        <option value="Pemeliharaan" {{ $pic->bidang == 'Pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>
                        <option value="ENJ dan QA" {{ $pic->bidang == 'ENJ dan QA' ? 'selected' : '' }}>ENJ dan QA</option>
                        <option value="Logistik" {{ $pic->bidang == 'Logistik' ? 'selected' : '' }}>Logistik</option>
                        <option value="Administrasi" {{ $pic->bidang == 'Administrasi' ? 'selected' : '' }}>Administrasi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="fungsi"><strong>Fungsi<strong></label><br>
                      <select class="form-control select2bs4" name="fungsi" id="fungsi" style="width: 100%;" required></br>
                        <option value="MMK" {{ $pic->fungsi == 'MMK' ? 'selected' : '' }}>MMK</option>
                        <option value="CBM" {{ $pic->fungsi == 'CBM' ? 'selected' : '' }}>CBM</option>
                        <option value="MRK" {{ $pic->fungsi == 'MRK' ? 'selected' : '' }}>MRK</option>
                        <option value="Listrik" {{ $pic->fungsi == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                        <option value="Mesin" {{ $pic->fungsi == 'Mesin' ? 'selected' : '' }}>Mesin</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="level"><strong>Level<strong></label><br>
                      <select class="form-control select2bs4" name="level" id="level" style="width: 100%;" required></br>
                        <option value="Admin" {{ $pic->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="PIC" {{ $pic->level == 'PIC' ? 'selected' : '' }}>PIC</option>
                        <option value="User" {{ $pic->level == 'User' ? 'selected' : '' }}>User</option>
                      </select>
                    </div>
                    
                 
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('pic') }}" class="btn btn-default">Cancel</a>
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