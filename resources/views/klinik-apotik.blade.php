@extends('layouts.user')
@section('style')

<script src="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js"></script>
	<link href="https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css" rel="stylesheet" />

	<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>

  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"  href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css"
    />
	
@endsection
@section('page-content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tanya Pakar</span>
          <h1 class="text-capitalize mb-5 text-lg">Lokasi Klinik & Apotik</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section department-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="department-img">
				<h1 class="text-center">Gogle Maps</h1> <br>
				
				<div id="map" style="height: 550px;width: 100%;"></div>
                   
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="department-content mt-5">
					<h3 class="text-md">Klinik & Apotik</h3>
					<div class="divider my-4"></div>
					<p class="lead">Melalui fitur gogle maps anda dapat mencari lokasi klinik maupun apotik yang dapat anda jangkau</p>
					<p>Berdasarkan keterangan dari departeman kesehatan "klinik" adalah salah satu instansi mikro yang barada ditengah-tengah lingkungan 
                        masyarakat, di klinik juga dapat melakukan pemerikasaan yang ditangani langsung oleh dokter spesialis tertentu. <br>
                        "Apotik atau Kimiafarma" adalah istansi peneyedia obat-obatan sesaui satandar kesehatan para dokter.
                    </p>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="sidebar-widget schedule-widget mt-5">
					<h5 class="mb-4">Keterangan</h5>

					<ul class="list-unstyled">
					  <li class="d-flex justify-content-between align-items-center">
					    <a href="#">Jumlah Klinik</a>
					    <span>9:00 - 17:00</span>
					  </li>
					  <li class="d-flex justify-content-between align-items-center">
					    <a href="#">Jumlah Apotik</a>
					    <span>9:00 - 16:00</span>
					  </li>
					  
					</ul>

					<div class="sidebar-contatct-info mt-4">
						<p class="mb-0">Pusat Layanan darurat</p>
						<h3>0822-6064-6685</h3>
					</div>
{{-- 
					@foreach ($apotik as $apotik)
              		<tr>
               
					<td>{{ $apotik->nama_apotik}}</td>
					<td>{{ $apotik->lat}}</td>

				 @endforeach --}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('js')

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
<script type="text/javascript">
	mapboxgl.accessToken = 'pk.eyJ1Ijoid2FoaWQzOSIsImEiOiJja3Q1cGN6MnEwYW1nMndyd3FuNzJyNGY3In0.nHHVAnrTnkwDjx3ElYwdIg';
	var map = new mapboxgl.Map({
		container: 'map', // nama container id untuk memuat map, di sini ada pada baris ke-16
		style: 'mapbox://styles/mapbox/satellite-v9', // stylesheet location, menentukan tampilan map
		center: [122.5947000,-3.9674889], // starting position [lng, lat]
		zoom: 14 // starting zoom
	});

	new mapboxgl.Marker().setLngLat([122.5947000,-3.9674889])
            .addTo(map)

//searc location
	map.addControl(
		new MapboxDirections({
		accessToken: mapboxgl.accessToken
		}),
		'top-left'
	);

                                // marker
                               @foreach ($apotik as $apotik)

                                    L.marker([{{ $apotik->lng}}, {{ $apotik->lat}}])
                                        .bindPopup("<h6>{{ $apotik->nama_apotik}}</h6>"+
                                                    "<img src='{{asset('image/'.$apotik->gambar )}}' >"
                                                   )
                                                    .addTo(map);

                                       @endforeach




                         
                           
//searc global
 var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker:true,
           
            zoom:20
        });
	 map.addControl(
            geocoder
        );



	
	

</Script>



@endsection