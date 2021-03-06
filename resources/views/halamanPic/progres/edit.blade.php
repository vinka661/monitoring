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
                                <form role="form" action="{{ route('updateProgresPic', $progresPic->progres_id) }}"
                                    method="POST" id="formIsian">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fdt"><strong>Nama FDT </strong></label>
                                            <select class="form-control select2bs4" name="id_fdt" id="id_fdt" style="width: 100%;" required disabled><br>
                                            @foreach ($fdt as $item)
                                                <option value="{{ $item->fdt_id }}" {{ $progresPic->id_fdt == $item->fdt_id ? 'selected' : '' }}>{{ $item->nama_fdt }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pic"><strong>Nama PIC</strong></label>
                                            <select class="form-control select2bs4" name="pic" id="pic" style="width: 100%;"
                                                required disabled><br>
                                                @foreach ($pic as $item)
                                                    <option value="{{ $item->pic_id }}"
                                                        {{ $progresPic->id_pic == $item->pic_id ? 'selected' : '' }}>
                                                        {{ $item->nama }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_progres"><strong>Progres<strong></label><br>
                                            <select class="form-control select2bs4" name="nama_progres" id="nama_progres"
                                                style="width: 100%;" required disabled></br>
                                                <option value="Kajian"
                                                    {{ $progresPic->nama_progres == 'Kajian' ? 'selected' : '' }}>Kajian
                                                </option>
                                                <option value="Perencanaan"
                                                    {{ $progresPic->nama_progres == 'Perencanaan' ? 'selected' : '' }}>
                                                    Perencanaan</option>
                                                <option value="Pengadaan"
                                                    {{ $progresPic->nama_progres == 'Pengadaan' ? 'selected' : '' }}>
                                                    Pengadaan</option>
                                                <option value="Eksekusi"
                                                    {{ $progresPic->nama_progres == 'Eksekusi' ? 'selected' : '' }}>
                                                    Eksekusi</option>
                                                <option value="Finish"
                                                    {{ $progresPic->nama_progres == 'Finish' ? 'selected' : '' }}>Finish
                                                </option>
                                            </select>
                                        </div>
                                        @if ($progresPic->status == 1)
                                            <div class="form-group">
                                                <label for="ket_progres"><strong>Keterangan Progres<strong></label>
                                                <p>(isi "sudah selesai" jika sudah menyelesaikan progres)</p>
                                                <textarea class="form-control" required="required" disabled
                                                    name="ket_progres" id="ket_progres"
                                                    value="{{ $progresPic->ket_progres }}">{{ $progresPic->ket_progres }} </textarea>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="ket_progres"><strong>Keterangan Progres<strong></label>
                                                <p>(isi "sudah selesai" jika sudah menyelesaikan progres)</p>
                                                <textarea class="form-control" required="required" name="ket_progres"
                                                    id="ket_progres"
                                                    value="{{ $progresPic->ket_progres }}">{{ $progresPic->ket_progres }} </textarea>
                                            </div>
                                        @endif
                                        @if ($progresPic->status == 1)
                                            <div class="form-group">
                                                <label for="tanggal_progres"><strong>Tanggal Progres<strong></label><br>
                                                <input type="date" class="form-control" disabled 
                                                    name="tanggal_progres" id="datepicker"
                                                    value="{{ $progresPic->tanggal_progres }}">
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="tanggal_progres"><strong>Tanggal Progres<strong></label><br>
                                                <input type="date" class="form-control" 
                                                    name="tanggal_progres" id="datepicker"
                                                    value="{{ $progresPic->tanggal_progres }}">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-body">  
                                        <button type="submit" class="btn btn-primary mr-1" id="bupdate">Update</button>
                                        <a href="{{ url('pic_progres/'. $progresPic->id_fdt . '/' . $progresPic->pic->nid  ) }}" class="btn btn-secondary">Cancel</a>
                                </form>
                                <form method="POST" action="{{ route('finishPic', $progresPic->progres_id) }}">
                                    @csrf
                                    <input type="text" name="status" id="" value="1" hidden><br>
                                    <button type="submit" value="1" class="btn btn-icon btn-success"><i class="fas fa-check"></i> Finish </button>
                                </div>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
        </div>
    @endsection
