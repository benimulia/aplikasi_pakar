@extends('layouts.user')
@section('page-content')


<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tanya Pakar</span>
          <h1 class="text-capitalize mb-5 text-lg">Hasil Analisa</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					<img src="{{asset('user/images/team/1.jpg')}}" alt="" class="img-fluid w-100">

					<div class="info-block mt-4">
						<h4 class="mb-0">Lisensi Sistem</h4>
						<p>Orthopedic Surgary</p>

						<ul class="list-inline mt-4 doctor-social-links">
							<li class="list-inline-item"><a href="#"><i class="icofont-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="icofont-skype"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="icofont-linkedin"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="icofont-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">Hasil analisa keluhan anda menunjukan</h2>
					<div class="divider my-4"></div>
					<p>Berdasarkan Keluhan yang telah anda ajukan ke kami melalui kuesioner sistem, maka kami menfonis anda mengalami 
                        penyakit ( "{{ $diagnosa->penyakit->nama }}" ). Tingkat Keseriusan Penyakit anda  ({{ $diagnosa->persentase }}%)
                    </p>
					 <H4>Detail hasil diagnosa</H4>

                     <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                              
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">Nama</div>
                                        <div class="col-md-9">: {{ $diagnosa->pasien->nama }}</div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">Tanggal Lahir </div>
                                        <div class="col-md-9">:   {{ $diagnosa->pasien->tgl_lahir }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Jenis Kelamin </div>
                                        <div class="col-md-9">: {{ $diagnosa->pasien->kelamins->js_kelamin }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">No telp </div>
                                        <div class="col-md-9">:  {{ $diagnosa->pasien->no_telpon }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Alamat Anda </div>
                                        <div class="col-md-9">: {{ $diagnosa->pasien->lokasi }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">Tanggal Diagnosa   </div>
                                        <div class="col-md-9">:  {{ Carbon\Carbon::now()->format('l, d F Y - H:i')}} </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label><strong>Gejala yang anda rasakan   :</strong></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <ol>
                                @foreach ($diagnosa->pasien->gejala as $gejala)
                                    <li>{{ $gejala->name }}</li>
                                @endforeach
                                </ol>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label><strong>Hasil Diagnosa :</strong></label>
                                </div>
                                <div class="col-md-12">
                                    <p><strong> Anda Menderita Penyakit (<u> {{ $diagnosa->penyakit->nama }}</u>).</strong></p>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>Tingkat keseriusan penyakit : <b>{{ $diagnosa->persentase }}%</b></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Definisi :</label>
                                        </div>
                                        <div class="col-md-9">
                                            <p>{{ $diagnosa->penyakit->definisi or 'Belum ada penjelasan lengkap mengenai penyakit ini.' }} {{ $diagnosa->penyakit->definisi }} </p>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-2">
                                            <label>Penyebab :</label>
                                        </div>
                                        <div class="col-md-9">
                                            <p>{{ $diagnosa->penyakit->penyebab }}</p>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Solusi   :</label>
                                        </div>
                                        <div class="col-md-9">
                                            <p>{{ $diagnosa->penyakit->solusis->nama_solusi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<a href="{{url('/home')}}" class="btn btn-main-2 btn-round-full mt-3">Selesai <i class="icofont-simple-right ml-2  "></i></a>
                   
				</div>
			</div>
		</div>
	</div>
</section>




@endsection