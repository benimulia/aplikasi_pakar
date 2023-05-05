@extends('layouts.user')
@section('page-content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tanya Pakar</span>
          <h1 class="text-capitalize mb-5 text-lg">Konsultasi keluhan</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h2 class="text-color ">0821-6021-6499 </h2>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Data Diri</h2>
            <p class="mb-4">Perhatian..!, Bagi pasien yang ingin melakukan konsultasi masalah keluhan yang dialami, terlebih dulu melakukan
                pengisian data yang telah diminta, isi data sesuai prosedur dan keterangan yang ada.
            </p>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
               <form id="#" class="appoinment-form" method="post" action="{{ route('storePasien') }}">
               {{ csrf_field() }}
                    <div class="row">

                    <div class="col-lg-6">
                            <div class="form-group">
                                <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="lokasi"  type="text" class="form-control" placeholder="Alamat Pasien">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="tgl_lahir"  type="date" class="form-control" placeholder="Tanggal Lahir">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="no_telpon" type="number" class="form-control" placeholder="No.Handpone">
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" name="kelamin_id">
                                  <option>Jenis Kelamin</option>
                                  @foreach ($kelamin as $kelamin)
                                   <option value="{{ $kelamin->id }}">{{ $kelamin->js_kelamin }}</option>
                                @endforeach
                                
                                </select>
                            </div>
                        </div>
                      
                    </div>
                  <button type="submit" class="btn btn-main btn-round-full"> Kirim & Lanjut Konsultasi<i class="icofont-simple-right ml-2"></i></button>

                    <!-- <a  class="btn btn-main btn-round-full" href="confirmation.html">Kirim & Lanjut Konsultasi<i class="icofont-simple-right ml-2"></i></a> -->
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection