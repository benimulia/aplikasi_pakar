@extends('layouts.master')

@section('page-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Edit Solusi </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($solusi as $row)
                    <form method="post" action="/solusi/update">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Penyakit Solusi</label>
                            <textarea class="form-control" type="text"  name="solusi" id="exampleFormControlTextarea1" rows="3">{{ $row->nama_solusi }}</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            @endforeach
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
