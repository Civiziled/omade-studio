<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="lenis lenis-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Studio d\'Enregistrement')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-studio-dark text-white font-sans antialiased overflow-x-hidden">

    <!-- WebGL Background Canvas -->
    <canvas id="webgl-canvas" class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none"></canvas>

    <!-- Header / Navbar (Simplified) -->
    <header class="absolute top-0 left-0 w-full z-50 p-6 mix-blend-difference" x-data="{ mobileMenuOpen: false }">
        <nav class="flex justify-between items-center max-w-7xl mx-auto">
            <a href="{{ route('home') }}" class="text-2xl font-display font-bold tracking-tight">O'Made<span class="text-studio-accent">.</span></a>
            
            <!-- Desktop Menu -->
            <ul class="hidden md:flex gap-8 text-sm font-medium items-center">
                <li><a href="{{ route('gallery') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('gallery') ? 'text-studio-accent' : '' }}">Galerie</a></li>
                <li><a href="{{ route('tarifs') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('tarifs') ? 'text-studio-accent' : '' }}">Tarifs</a></li>
                <li><a href="{{ route('booking') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('booking') ? 'text-studio-accent' : '' }}">Réserver</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('contact') ? 'text-studio-accent' : '' }}">Contact</a></li>
                <li class="h-6 w-px bg-white/20 mx-2"></li>
                @auth
                    <li><a href="{{ route('dashboard') }}" class="text-studio-accent hover:text-white transition-colors">Mon Compte</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-white transition-colors">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors">Connexion</a></li>
                    <li><a href="{{ route('register') }}" class="bg-studio-accent text-white px-4 py-2 rounded-full hover:bg-white hover:text-studio-dark transition-colors font-semibold">S'inscrire</a></li>
                @endauth
            </ul>

            <!-- Mobile Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none p-2">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </nav>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" x-transition x-cloak class="md:hidden absolute top-full left-0 w-full bg-studio-dark/95 backdrop-blur-xl border-b border-white/10 flex flex-col items-center py-8 gap-6 shadow-2xl">
            <a href="{{ route('gallery') }}" class="text-lg font-medium hover:text-studio-accent transition-colors">Galerie</a>
            <a href="{{ route('tarifs') }}" class="text-lg font-medium hover:text-studio-accent transition-colors">Tarifs</a>
            <a href="{{ route('booking') }}" class="text-lg font-medium hover:text-studio-accent transition-colors">Réserver</a>
            <a href="{{ route('contact') }}" class="text-lg font-medium hover:text-studio-accent transition-colors">Contact</a>
            <div class="h-px w-1/2 bg-white/20 my-2"></div>
            @auth
                <a href="{{ route('dashboard') }}" class="text-lg text-studio-accent font-medium">Mon Compte</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-lg text-gray-400 hover:text-white transition-colors">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-lg text-gray-300 hover:text-white transition-colors">Connexion</a>
                <a href="{{ route('register') }}" class="bg-studio-accent text-white px-8 py-3 rounded-full hover:bg-white hover:text-studio-dark transition-colors font-semibold text-lg mt-2">S'inscrire</a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Floating Audio Toggle -->
    <button id="audio-toggle" class="fixed bottom-8 right-8 z-50 w-14 h-14 bg-zinc-900/80 backdrop-blur-md border border-white/10 rounded-full flex items-center justify-center text-white shadow-[0_0_20px_rgba(205,127,50,0.1)] hover:border-studio-accent hover:scale-110 hover:text-studio-accent transition-all group group-hover:shadow-[0_0_20px_rgba(205,127,50,0.4)]" aria-label="Play/Pause Background Music">
        <!-- SVG Play -->
        <svg id="audio-icon-play" class="w-6 h-6 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <!-- SVG Pause (Hidden by default) -->
        <svg id="audio-icon-pause" class="w-6 h-6 hidden transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <!-- Audio Waves Animation (Hidden by default) -->
        <div id="audio-waves" class="absolute -top-1 -right-1 w-4 h-4 hidden flex items-end justify-center gap-[2px]">
            <div class="w-[2px] h-[6px] bg-studio-accent animate-[bounce_0.8s_infinite] rounded-full"></div>
            <div class="w-[2px] h-[10px] bg-studio-accent animate-[bounce_1s_infinite_0.2s] rounded-full"></div>
            <div class="w-[2px] h-[4px] bg-studio-accent animate-[bounce_0.9s_infinite_0.4s] rounded-full"></div>
        </div>
    </button>

    <!-- Professional Footer -->
    <footer class="bg-black pt-20 pb-10 relative z-10 border-t border-white/10 mt-auto overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-studio-accent/5 via-black to-black pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between gap-12 mb-16">
                <!-- GAUCHE : Branding -->
                <div class="md:w-1/3 space-y-6">
                    <a href="{{ route('home') }}" class="text-3xl font-display font-bold tracking-tight text-white block">O'Made<span class="text-studio-accent">.</span></a>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        Le studio d'enregistrement de référence à Diegem. Équipement premium, acoustique parfaite et accompagnement sur-mesure.
                    </p>
                </div>

                <!-- MILIEU : Liens -->
                <div class="md:w-1/3 flex md:justify-center">
                    <div>
                        <h4 class="text-white font-semibold uppercase tracking-widest text-sm mb-6">Plan du site</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-studio-accent transition-colors text-sm flex items-center gap-2 group"><span class="w-1 h-1 bg-studio-accent rounded-full opacity-0 -translate-x-2 transition-all group-hover:opacity-100 group-hover:translate-x-0"></span>Accueil</a></li>
                            <li><a href="{{ route('gallery') }}" class="text-gray-400 hover:text-studio-accent transition-colors text-sm flex items-center gap-2 group"><span class="w-1 h-1 bg-studio-accent rounded-full opacity-0 -translate-x-2 transition-all group-hover:opacity-100 group-hover:translate-x-0"></span>Galerie</a></li>
                            <li><a href="{{ route('tarifs') }}" class="text-gray-400 hover:text-studio-accent transition-colors text-sm flex items-center gap-2 group"><span class="w-1 h-1 bg-studio-accent rounded-full opacity-0 -translate-x-2 transition-all group-hover:opacity-100 group-hover:translate-x-0"></span>Tarifs</a></li>
                            <li><a href="{{ route('booking') }}" class="text-gray-400 hover:text-studio-accent transition-colors text-sm flex items-center gap-2 group"><span class="w-1 h-1 bg-studio-accent rounded-full opacity-0 -translate-x-2 transition-all group-hover:opacity-100 group-hover:translate-x-0"></span>Réserver</a></li>
                            <li class="pt-2"><a href="{{ route('legal.mentions') }}" class="text-gray-500 hover:text-white transition-colors text-xs">Mentions Légales</a></li>
                            <li><a href="{{ route('legal.cgv') }}" class="text-gray-500 hover:text-white transition-colors text-xs">Conditions Générales de Vente</a></li>
                            <li><a href="{{ route('legal.privacy') }}" class="text-gray-500 hover:text-white transition-colors text-xs">Politique de Confidentialité</a></li>
                        </ul>
                    </div>
                </div>

                <!-- DROITE : Contact & Socials -->
                <div class="md:w-1/3 flex md:justify-end">
                    <div class="text-left md:text-right">
                        <h4 class="text-white font-semibold uppercase tracking-widest text-sm mb-6">Nous Suivre</h4>
                        <div class="flex md:justify-end gap-4 mb-8">
                            <a href="https://instagram.com/Saws.97" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-studio-accent hover:border-studio-accent transition-all transform hover:scale-110">📸</a>
                            <a href="https://tiktok.com/@omade.be" target="_blank" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-studio-accent hover:border-studio-accent transition-all transform hover:scale-110">🎵</a>
                        </div>
                        <p class="text-sm text-gray-500 mb-2">Une question rapide ?</p>
                        <a href="mailto:contact@omade-studio.be" class="text-white font-medium hover:text-studio-accent transition-colors block">contact@omade-studio.be</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>© {{ date('Y') }} O'Made Studio. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>
</html>
