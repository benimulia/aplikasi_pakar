@extends('layouts.master')

@section('page-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Konsultasi </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('storePasien') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Nama :</label>
                                    <input type="text" name="nama" class="form-control" required="required" placeholder="Nama pasien ">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>No. NIK :</label>
                                    <input type="text" name="nik" class="form-control" required="required" placeholder="Input No NIK ">
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="lokasi"></textarea>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tgl Lahir  : </label>
                                    <input type="date" name="tgl_lahir" class="form-control" required="required" placeholder="tanggal lahir ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Nomor Telp :</label>
                                    <input type="number" name="no_telpon" class="form-control" required="required" placeholder="+62..">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-7">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="kelamin_id">
                                <option>--pilih--</option>
                                @foreach ($kelamin as $kelamin)
                                   <option value="{{ $kelamin->id }}">{{ $kelamin->js_kelamin }}</option>
                                @endforeach

                            </select>
                        </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <p><button type="submit" class="btn btn-primary center-block">Mulai Konsultasi <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i></button></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
