@extends('layouts.master')
@section('style')

<link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('page-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekap Data Pasien </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pasien </li>
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
        <h6 class="m-0 font-weight-bold text-primary">Rekap All Data Pasien</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="gejala" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <!-- <th> NIK </th> -->
                <th>Nama Pasien  </th>
                <th>Tanggal Lahir   </th>
                <th>Jenis Kelamin  </th>
                <th>Alamat   </th>
                <th>No Telp   </th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($pasien as $pasien)
              <tr>
                <td>{{ $no++ }}.</td>
                <!-- <td>{{ $pasien->nik }}</td> -->
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->tgl_lahir }}</td>
                <td>{{ $pasien->kelamins->js_kelamin }}</td>
                <td>{{ $pasien->lokasi }}</td>
                <td>{{ $pasien->no_telpon }}</td>
                <td>
                    <form action="{{ route('pasein.destroy', $pasien->id) }}" method="POST">
                        @csrf
                        <button onclick="return confirm('yakin data akan di hapus..?')" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
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

</script>
@endsection

