@extends('layouts.master')
@section('style')

<link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('page-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Solusi Penyakit </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Solusi  </li>
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
        <h6 class="m-0 font-weight-bold text-primary">Data Solusi </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="solusi" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Solusi Penyakit </th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($solusi as $row)
              <tr>
                <td>{{ $no++  }}</td>
                <td> {{ $row->nama_solusi }} </td>
                <td>
                    <a href="solusi/edit/{{ $row->id }}" class="btn btn-primary" ><i class="fa fa-edit"></i></a>
                    <a href="/solusi/hapus/{{ $row->id }}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
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
  <div class="modal fade" id="addSolusi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">From Input Solusi Penyakit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/solusi/store">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Penyakit Solusi</label>
                    <textarea class="form-control" type="text" name="nama_solusi" id="exampleFormControlTextarea1" rows="3"></textarea>
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
        $('#solusi').DataTable();
    });

    @if (Auth::user())
			$(document).ready(function() {
			    $('.dataTables_filter input').after('<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSolusi" style="margin-left: 20px"><i class="fa fa-fw fa-plus"></i> Data ~ </button>');
			});
		@endif

</script>
@endsection

