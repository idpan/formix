@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<section class="hero" style="background-image: url({{asset("images/wiljantoro-hero-image.jpg")}})">
  <div class="content">

    <h1 class="heading">{{$sections[0]->header}}</h1>
    <p class="subheading">{{$sections[0]->paragraph}}</p>
  </div>
</section>
{{-- about section --}}
<section class="about">
  <div class="image">
    <img src="{{asset("images/wiljantoro-section-image.jpg")}}" alt="">
  </div>
  <div class="content">
    <h2 class="heading">{{$sections[1]->header}}</h2>
    <p class="description">{{$sections[1]->paragraph}} </p>
  </div>
</section>

{{-- featured projects section --}}
<section class="featured-project">
  <div class="container">
    <div class="featured-header">
      <div>
        <h2>{{ $sections[2]->header }}</h2>
        <p>{{$sections[2]->paragraph}}</p>
      </div>
      <a href="/projects" class="cta-button">Lihat Semua Project</a>
    </div>

  </div>
</section>
@endsection


@section('script')
<script>
  $(document).ready(function() {
    $('.project-slider').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      arrows: true,
      dots: true,
      pauseOnHover: true,
      fade: true,
      infinite: true,
      speed: 500,
    });
  });
</script>

@endsection