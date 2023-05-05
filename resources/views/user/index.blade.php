@extends('layouts.master')
@section('style')

<link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('page-content')
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah User Baru </button>
          </div>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_user }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Data Penyakit</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_penyakit }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Data Gejala</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_gejala }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tingkat pengguanaan aplikasi </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jumlah_user }}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



    @if (session('status'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ session('pesan') }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Authenticated User</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="user" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama user </th>
                <th>Email  </th>
                <th>Level   </th>
                <th>aksi</th>

              </tr>
            </thead>
           
            <tbody>
                @php $no=1; @endphp
                @foreach ($user as $row)
              <tr>
                <td>{{ $no++ }}.</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->level }}</td>
                <td>
                    <form action="{{ route('user.destroy', $row->id) }}" method="POST">
                        @csrf
                        <a href="{{ route('user.edit',$row->id) }}" class="btn btn-success"><i class="fas fa-edit"></i>
                          </a>
                        <button class="btn btn-danger" onclick="retrun confirm('yakin mau di hapus?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User Baru </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <di class="modal-body">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nama User </label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="your email">
                    <small id="emailHelp" class="form-text text-muted">Isikan Email yang valid </small>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Level</label>
                    <select class="form-control" name="level" id="exampleFormControlSelect1">
                      <option>pasien</option>
                      <option>admin</option>
                    </select>
                  </div>
                  {{-- <div class="form-group">
                      <label for="level">Level</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="level" value="pasien" checked>
                            <label for="level" class="form-check-label">pasien</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="level" value="admin" checked>
                            <label for="level" class="form-check-label">admin</label>
                        </div>
                  </div> --}}
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  <small id="password" class="form-text text-muted">panjang password harus 8 karakter  </small>
                </div>
                <div class="form-group">
                    <label for="password-confirmasi">Password confirmasi </label>
                    <input type="password" name="password_confirmation" class="form-control" id="password-confirmasi" placeholder="Password">
                    <small id="password" class="form-text text-muted">panjang password harus 8 karakter  </small>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
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
        $('#user').DataTable();
    });

     @if (Auth::user())
	$(document).ready(function() {
	$('.dataTables_filter input').after('<a herf="{{ url ('user.create')  }}" class="btn btn-primary btn-sm"  style="margin-left: 20px"><i class="fa fa-fw fa-plus"></i> user </a>');
	});
	@endif
</script>
@endsection

