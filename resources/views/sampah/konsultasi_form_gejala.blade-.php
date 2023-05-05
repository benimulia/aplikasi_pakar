@extends('layouts.master')
@section('page-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Perikas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" action="{{ route('diagnosa') }}">
                        {{ csrf_field() }}
                    <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                    <div class="form-group">
                       <center><label><b>Apa Keluhan yang anda alami...? </b></label><br></center>
                        <label>-------------------------------------------------------------------------------------------------------------------------------</label>
                        <br>
                        <div class="col-md-12">
                            @foreach ($gejala as $gejala)
                                <div class="checkbox">
                                    <label><input class="check" type="checkbox" name="gejala[]" value="{{ $gejala->id }}">{{ $gejala->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Cek Hasil Diagnonsa <i class="fa fa-fw fa-search"></i></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
