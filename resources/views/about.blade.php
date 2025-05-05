@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')

<!-- Story Section -->
<section class="story">
  <div class="image">
    <img src="{{asset('images/wiljantoro-hero-image.jpg')}}">
  </div>
  <div class="content">
    <h2 class="heading">{{$sections[0]->header}}</h2>
    <p class="content__text">{{$sections[0]->paragraph}}</p>
  </div>
</section>

<div class="section-gap"></div>
<!-- vision Section -->
<section class="vision">
  <div class="image">
    <img src="{{asset('images/wiljantoro-section-image.jpg')}}">
  </div>
  <div class="content">
    <h2 class="heading">{{$sections[1]->header}}</h2>
    <p class="content__text">{{$sections[1]->paragraph}}</p>
  </div>
</section>

<div class="section-gap"></div>
<!-- mission Section -->
<section class="mission">
  <div class="image">
    <img src="{{asset('images/wiljantoro-hero-image.jpg')}}" </div>
    <div class="content">
      <h2 class="heading">{{$sections[2]->header}}</h2>
      <p class="content__text">{{$sections[2]->paragraph}}</p>
    </div>
</section>

@endsection