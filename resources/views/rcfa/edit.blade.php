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
            <h2 class="m-0 text-dark"><strong>Edit Asset </strong></h2></br>
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
                <form role="form" action="{{ route('updateAsset', $asset->asset_id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="asset_id"><strong>Asset ID<strong></label><br>
                        <input type="text" class="form-control" id="asset_id" name="asset_id" value="{{ $asset->asset_id }}">
                      </div>
                        <div class="form-group">
                            <label for="area"><strong>Area</strong></label>
                            <select class="form-control select2bs4" name="area" id="area" style="width: 100%;">
                              @foreach ($area as $item)
                                <option value="{{ $item->area_id }}" {{ $asset->id_area == $item->area_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                      <div class="form-group">
                        <label for="rbdid"><strong>RBDID</strong></label><br>
                        <input type="text" class="form-control" id="rbdid" name="rbdid" value="{{ $asset->rbdid }}">
                      </div>
                      <div class="form-group">
                        <label for="equipment"><strong>Equipment</strong></label></br>
                        <input type="text" class="form-control" id="equipment" name="equipment" value="{{ $asset->equipment }}">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('asset') }}" class="btn btn-default">Cancel</a>
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