@extends('layouts.master')
@section('page-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
