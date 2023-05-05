@extends('layouts.master')
@section('style')

<link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('page-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Penyakit </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Penyakit </li>
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
        <h6 class="m-0 font-weight-bold text-primary">Data Penyakit</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="gejala" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Penyakit</th>
                <th>Gejala </th>
                <th>aksi</th>
              </tr>
            </thead>
        
            <tbody>
                @php $no=1; @endphp
                @foreach ($penyakit as $penyakit)
              <tr>
                <td>{{ $no++ }}.</td>
                <td>{{ $penyakit->nama }}</td>
                <td>
                    <ul style="padding-left: 16px;">
                        @forelse($penyakit->gejala as $gejala)
                            <li>{{ $gejala->name }}</li>
                        @empty
                            Maaf, belum ada data gejala untuk penyakit ini.
                        @endforelse
                    </ul>
                </td>

                <td>
                    @if (Auth::user())
                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('{{ route('penyakit.edit', $penyakit->id) }}')" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="$('form[name={{ $penyakit->id }}]').submit();"><i class="fa fa-trash"></i></button>
                    <form name="{{ $penyakit->id }}" method="post" action="{{ route('penyakit.destroy', $penyakit->id) }}">
                        {{ method_field('delete') }}
                        @csrf
                    </form>
                @else
                    {{-- <button type="button" class="btn btn-primary btn-sm" onclick="show('{{ route('detail', $penyakit->id) }}')" data-toggle="modal" data-target="#show"><i class="fa fa-eye"></i></button> --}}
                @endif
            </td>

              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @if (Auth::user())
    <!-- Large Size -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Data Penyakit </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{ route('penyakit.store') }}">
                            @csrf
                        <div class="row">
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Penyakit :</label>
                                    <input type="text" name="nama" class="form-control" required="required" placeholder="Nama dari penyakit...">
                                </div>
                                <div class="form-group">
                                    <label>Penyebab :</label>
                                    <input type="text" name="penyebab" class="form-control" required="required" placeholder="Penyakit disebabkan oleh...">
                                </div>
                                <div class="form-group">
                                    <label>Definisi Penyakit :</label>
                                    <textarea name="definisi" class="form-control" rows="5" required="required" placeholder="Jelaskan mengenai penyakit ini..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Solusi</label>
                                    <select class="form-control" name="solusi_id">
                                        <option>--pilih--</option>
                                        @foreach ($solusi as $row)
                                           <option value="{{ $row->id }}">{{ $row->nama_solusi }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 ml-auto">
                                <div class="form-group">
                                    <label>Gejala-gejala yang terjadi :</label>
                                    <div class="col-md-12">
                                        @foreach ($gejalas as $gejala)
                                            <div class="checkbox">
                                                  <label><input type="checkbox" name="gejala[]" value="{{ $gejala->id }}">{{ $gejala->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>



     <!-- Large Size edit  -->
     <div class="modal fade" id="edit" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Update Data Penyakit </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="post" action="{{ route('penyakit.store') }}">
                            @csrf
                        <div class="row">
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Penyakit :</label>
                                    <input type="text" name="nama" class="form-control" required="required" placeholder="Nama dari penyakit...">
                                </div>
                                <div class="form-group">
                                    <label>Penyebab :</label>
                                    <input type="text" name="penyebab" class="form-control" required="required" placeholder="Penyakit disebabkan oleh...">
                                </div>
                                <div class="form-group">
                                    <label>Definisi Penyakit :</label>
                                    <textarea name="definisi" class="form-control" rows="5" required="required" placeholder="Jelaskan mengenai penyakit ini..." ></textarea>
                                </div>
                            </div>
                            <div class="col-md-8 ml-auto">
                                <div class="form-group">
                                    <label>Gejala-gejala yang terjadi :</label>
                                    <div class="col-md-12">
                                        @foreach ($gejalas as $gejala)
                                            <div class="checkbox">
                                                  <label><input type="checkbox" name="gejala[]" value="{{ $gejala->id }}">{{ $gejala->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  @endif
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

    function show(route) {
			$.get(route, function(data) {
				$('#show .modal-body').html(data);
			});
		}


		@if (Auth::user())
			$(document).ready(function() {
			    $('.dataTables_filter input').after('<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#largeModal" style="margin-left: 10px"><i class="fa fa-fw fa-plus"></i> Penyakit </button>');
			});

			function edit(route) {
				$.get(route, function(data) {
					$('#edit .modal-body').html(data);
				});
			}
		@endif

</script>
@endsection

