<section class="hero">
    <div class="hero__container">
        <h1 class="hero__title">{{ $hero['title'] ?? 'Solusi Konstruksi Terbaik untuk Anda' }}</h1>
        <p class="hero__subtitle">{{ $hero['subtitle'] ?? 'Profesionalisme & Kepercayaan dalam Setiap Proyek' }}</p>
        <a href="/contact" class="">
            {{ $hero['cta_text'] ?? 'Hubungi Kami' }}
        </a>
    </div>
</section>
