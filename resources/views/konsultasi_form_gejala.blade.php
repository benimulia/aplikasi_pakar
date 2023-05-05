@extends('layouts.user')
@section('page-content')


<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tanya Pakar</span>
          <h1 class="text-capitalize mb-5 text-lg">Konsultasi Keluhan</h1>
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
              <h2 class="text-color mt-3">081264996021</h2>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Apa Keluhan Anda..?</h2>
            <p class="mb-4">Silahkan "Centang" Pertanyaan-pertanyaan yang telah disiapkan oleh pakar mengenai keluhan penyakit yang anda alami.</p>
               <form class="appoinment-form" method="post" action="{{ route('diagnosa') }}">
                    <div class="row">
                    {{ csrf_field() }}
                    <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                    <div class="form-group">
                       <center><label><b> "Centang Berdasarkan Keluahan Anda"</b></label><br></center>
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
                        <button type="submit" class="btn btn-main btn-round-full">Cek Hasil Diagnosa<i class="icofont-simple-right ml-2"></i></button>
                         {{-- <button type="submit" target="_blank" class="btn btn-main btn-round-full">Unduh Hasil<i class="icofont-simple-right ml-2"></i></button> --}}
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection