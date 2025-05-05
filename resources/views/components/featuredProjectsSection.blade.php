<section class="featured-project">
    <div class="container">
      <div class="featured-header">
        <div>
          <h2>{{ $featured_projects_section['heading'] }}</h2>
          <p>Proyek pilihan yang merepresentasikan kualitas dan cakupan kerja kami.</p>
        </div>
        <a href="/projects" class="cta-button">Lihat Semua Project</a>
      </div>
  
      <div class="project-slider">
        @foreach ($featured_projects->take(5) as $project)
          <div class="slider-item">
            <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->name }}">
            <h3>{{ $project->name }}</h3>
            <p>{{ $project->client }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>