@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endsection

@section('content')

{{-- Hero section kecil --}}
<section class="projects-hero" style="background-image: url({{asset('images/wiljantoro-section-image.jpg')}})">
  <div class="projects-hero__content">
    <h1 class="heading">{{$sections[0]->header}}</h1>
    <p class="subheading">{{$sections[0]->paragraph}}</p>
  </div>
  <div class="overlay"></div>
</section>

<div class="project__container">
  @if($projects->isEmpty())
  <p>Tidak ada project yang ditemukan untuk kategori ini.</p>
  @else
  @foreach ($projects as $project)
  <div class="card">
    <div class="card__image">
      @php
      $imagePathLocal = asset('images/exterior.jpg');
      $imagePathOriginal = asset('storage/' . $project->image_path);
      @endphp
      <img src="{{ $imagePathLocal }}" alt="$project->title">
    </div>
    <div class="card__info">
      <div class="card__name">{{ $project->title }}</div>
      <h2 class="card__clientName">{{ $project->client_name }}</h2>
    </div>
  </div>
  @endforeach
  @endif
</div>
</section>

@endsection