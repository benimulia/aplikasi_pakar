@extends('layouts.master')
@section('style')

<link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('page-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Gejala Penyakit</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Gejala </li>
    </ol>
	@if (session('status'))
		<div class="alert alert-success">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success!</strong> {{ session('status') }}
	    </div>
	@endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Gejala </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="gejala" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Gejala</th>
                <th>aksi</th>

              </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($gejala as $gejala)
              <tr>
                <td>{{ $no++  }}</td>
                <td>
                    <span class="{{ $gejala->id }}">{{ $gejala->name }}</span>
                    <form class="{{ $gejala->id }}" style="display: none" method="post" action="{{ route('gejala.update', $gejala->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                            <div class="input-group col-md-12">
                                <input type="text" name="gejala" class="form-control" value="{{ $gejala->name }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> update</button>
                                </span>
                            </div>
                        </form>
                    </td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="$('.{{ $gejala->id }}').toggle();"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="$('form[name={{ $gejala->id }}]').submit();"><i class="fa fa-trash"></i></button>
                    <form name="{{ $gejala->id }}" method="post" action="{{ route('gejala.destroy', $gejala->id) }}">
                        @csrf
                        {{ method_field('delete') }}
                    </form>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('gejala.store') }}">
                @csrf
                <div class="form-group">
                    <label>Deskripsi Nama Gejala Penyakit..!</label>
                    <div class="input-group">
                        <input type="text" name="gejala" class="form-control">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#gejala').DataTable();
    });

    @if (Auth::user())
			$(document).ready(function() {
			    $('.dataTables_filter input').after('<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addGejala" style="margin-left: 20px"><i class="fa fa-fw fa-plus"></i> Gejala </button>');
			});
		@endif

</script>
@endsection

