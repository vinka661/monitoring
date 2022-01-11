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
            <h2 class="m-0 text-dark"><strong>Tambah PIC Baru</strong></h2></br>
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
              <form role="form" action="{{ route('storePic') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nid"><strong>NID<strong></label><br>
                    <input type="text" class="form-control" id="nid" name="nid" placeholder="No NID" required>
                  </div>
                  <div class="form-group">
                    <label for="nama"><strong>Nama<strong></label><br>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama PIC" required>
                  </div>
                  <div class="form-group">
                    <label for="password"><strong>Password<strong></label><br>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="bidang"><strong>Bidang<strong></label><br>
                    <select class="form-control select2bs4" name="bidang" id="bidang" style="width: 100%;" required></br>
                      <option value="Operasi">Operasi</option>
                      <option value="Pemeliharaan">Pemeliharaan</option>
                      <option value="ENJ dan QA">ENJ dan QA</option>
                      <option value="Logistik">Logistik</option>
                      <option value="Administrasi">Administrasi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fungsi"><strong>Fungsi<strong></label><br>
                    <select class="form-control select2bs4" name="fungsi" id="fungsi" style="width: 100%;" required></br>
                      <option value="MMK">MMK</option>
                      <option value="CBM">CBM</option>
                      <option value="MRK">MRK</option>
                      <option value="Listrik">Listrik</option>
                      <option value="Mesin">Mesin</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="level"><strong>Level<strong></label><br>
                    <select class="form-control select2bs4" name="level" id="level" style="width: 100%;" required></br>
                      <option value="Admin">Admin</option>
                      <option value="PIC">PIC</option>
                      <option value="User">User</option>
                    </select>
                  </div>
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
