<nav class="navbar">
    <div class="navbar-content">
        <a href="{{ route('home') }}" class="navbar-logo">
            <span class="logo-text">zonera</span>
        </a>
        
        <ul class="navbar-menu">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ route('methods') }}" class="nav-link {{ request()->routeIs('methods') ? 'active' : '' }}">Metode</a></li>
            <li><a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
            <li><a href="{{ route('room') }}" class="nav-link btn-primary {{ request()->routeIs('room') ? 'active' : '' }}">Masuk Ruangan</a></li>
        </ul>
    </div>
</nav>
