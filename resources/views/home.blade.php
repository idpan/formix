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
@php
$setting = \App\Models\EstimasiSetting::first();
@endphp

<style>
  .estimasi-form-container {
    max-width: 500px;
    margin: 30px auto;
    padding: 20px;
    border-radius: 10px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
  }

  .estimasi-form-container h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #333;
  }

  .estimasi-form-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .estimasi-form-container input[type="number"],
  .estimasi-form-container input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
  }

  .estimasi-form-container button {
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
  }

  .estimasi-form-container button:hover {
    background-color: #0056b3;
  }

  .estimasi-form-container .catatan {
    font-size: 13px;
    color: #555;
    margin-top: 10px;
    text-align: center;
  }

  .estimasi-form-container .alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    border: 1px solid #c3e6cb;
  }

  .estimasi-form-container .alert-error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    border: 1px solid #f5c6cb;
  }
</style>

@if(!$setting || !$setting->aktif)
<div class="estimasi-form-container">
  <div class="alert-error">Form estimasi sedang tidak tersedia.</div>
</div>
@else
<div class="estimasi-form-container">
  <h2>{{ $setting->form_header ?? 'Form Estimasi RAB' }}</h2>

  @if(session('success'))
  <div class="alert-success">{{ session('success') }}</div>
  @endif

  @if($errors->any())
  <div class="alert-error">{{ $errors->first() }}</div>
  @endif

  <form method="POST" action="{{ route('estimasi.store') }}">
    @csrf
    <label for="luas">Luas Bangunan (m²)</label>
    <input type="number" name="luas" required>

    <label for="kontak">Kontak WhatsApp / Email</label>
    <input type="text" name="kontak" required>

    <button type="submit">Hitung Estimasi</button>
  </form>

  @if($setting->catatan)
  <p class="catatan">{{ $setting->catatan }}</p>
  @endif
</div>
@endif



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