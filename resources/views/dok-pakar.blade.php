@extends('layouts.user')

@section('page-content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tanya Pakar</span>
          <h1 class="text-capitalize mb-5 text-lg">Biografi Pakar</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Pakar Spesialis Gigi & Mulut</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Sistem pakar ini telah mendapat dukungan dari bebrapa pakar sesaui bidang dan keahlian.</p>
				</div>
			</div>
		</div>

		<div class="row">
		@foreach ($pakar as $pakar)
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<img src="{{asset('image/'.$pakar->gambar)}}" alt="" class="img-fluid w-100">
					<div class="content">				
						<h4 class="mt-4 mb-2 title-color">{{ $pakar->nama}}</h4>
						<p class="mb-4">{{ $pakar->biografi}}</p>
						<a href="/detail-pakar" class="read-more">Selanjutnya<i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
			 @endforeach
			
		</div>
	</div>
</section>

@endsection