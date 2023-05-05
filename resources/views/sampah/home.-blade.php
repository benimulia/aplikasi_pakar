@extends('layouts.master')
@section('style')
  <!-- Bootstrap core CSS -->
    {{-- <link href="slider/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link href="slider/carousel.css" rel="stylesheet">

@endsection

@section('page-content')
 <div class="card mb-6">
     <div class="card mb-4 py-3 border-bottom-primary">
        <div class="card-body">
        <h2>
            <b><center>  Selmat Datang Di Website Sistem Pakar Diagnosa Penyakit  Gigi Dan Mulut</center>
        </h2>
        </div>
    </div>
 </div>
 @if (session('status'))
 <div class="alert alert-success">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success!</strong> {{ session('status') }}
 </div>
 @endif
    <div class="card mb-4">
    <div class="card-body">
    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="{{asset('slider/gambar/img1.jpg')}}" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>PENTINGNYA MENJAGA KESEHATAN GIGI DAN MULUT SEJAK DINI</h1>
                <p>Kesehatan gigi dan mulut sering kali diabaikan oleh masyarakat. Rendahnya kesadaran dalam merawat kesehatan gigi
                   dan mulut merupakan salah satu penyebab dari penyakit gigi dan mulut pada masyarakat Indonesia. </p>
                <p><a  href="#" role="button">Baca Lebih Lengkap</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{asset('slider/gambar/img2.jpg')}}" alt="Second slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Another example headline.</h1>
                <p>Kesehatan gigi dan mulut sering kali diabaikan oleh masyarakat. Rendahnya kesadaran dalam merawat 
                   kesehatan gigi dan mulut merupakan salah satu penyebab dari penyakit gigi dan mulut pada masyarakat Indonesia.</p>
                <p><a href="#" role="button">Baca Lebih Lengkap</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{asset('slider/gambar/img3.jpg')}}" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a  href="#" role="button">Baca Lebih Lengkap</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </main>
    <center><a class="btn btn-lg btn-danger" href="/konsultasi" role="button">Konsultasi Sekarang </a></center>

     </div>
     </div>

@endsection



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
  </body>
</html>


