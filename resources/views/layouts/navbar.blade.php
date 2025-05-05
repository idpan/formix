<nav class="navbar">
    <div class="navbar-container">
      <a href="/" class="navbar-brand">Wiljantoro</a>
      <ul class="navbar-menu">
        @foreach ($menuItems as $item)
          <li><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></li>
        @endforeach
      </ul>
      <div class="navbar-toggle" onclick="toggleMenu()">☰</div>
    </div>
  </nav>
  