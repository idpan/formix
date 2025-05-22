@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

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
        <p>{{ $sections[2]->paragraph }}</p>
      </div>
    </div>

    <div class="project-slider">
      @foreach ($projects as $project)
      <div class="project-item">
        @php
        $imagePath = asset('images/exterior.jpg');
        @endphp

        <img src="{{ $imagePath }}" alt="{{ $project->title }}">
        <div class="project-info">
          <h3>{{ $project->title }}</h3>
          <p>{{ $project->description }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <a href="/projects" class="cta-button">Lihat Semua Project</a>
  </div>
</section>

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endsection