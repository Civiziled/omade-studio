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
    <header class="fixed top-0 left-0 w-full z-50 p-6 mix-blend-difference">
        <nav class="flex justify-between items-center max-w-7xl mx-auto">
            <a href="{{ route('home') }}" class="text-2xl font-display font-bold tracking-tight">O'Made<span class="text-studio-accent">.</span></a>
            <ul class="flex gap-8 text-sm font-medium">
                <li><a href="{{ route('gallery') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('gallery') ? 'text-studio-accent' : '' }}">Galerie</a></li>
                <li><a href="{{ route('booking') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('booking') ? 'text-studio-accent' : '' }}">Réserver</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-studio-accent transition-colors {{ request()->routeIs('contact') ? 'text-studio-accent' : '' }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Professional Footer -->
    <footer class="bg-black pt-20 pb-10 relative z-10 border-t border-white/10 mt-auto overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-studio-accent/5 via-black to-black pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between gap-12 mb-16">
                <!-- GAUCHE : Branding -->
                <div class="md:w-1/3 space-y-6">
                    <a href="{{ route('home') }}" class="text-3xl font-display font-bold tracking-tight text-white block">O'Made<span class="text-studio-accent">.</span></a>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        Le studio d'enregistrement de référence à Bruxelles. Équipement premium, acoustique parfaite et accompagnement sur-mesure.
                    </p>
                </div>

                <!-- MILIEU : Liens -->
                <div class="md:w-1/3 flex md:justify-center">
                    <div>
                        <h4 class="text-white font-semibold uppercase tracking-widest text-sm mb-6">Plan du site</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-studio-accent transition-colors text-sm flex items-center gap-2 group"><span class="w-1 h-1 bg-studio-accent rounded-full opacity-0 -translate-x-2 transition-all group-hover:opacity-100 group-hover:translate-x-0"></span>Accueil</a></li>
                            <li><a href="{{ route('gallery') }}" class="text-gray-400 hover:text-studio-accent transition-colors text-sm flex items-center gap-2 group"><span class="w-1 h-1 bg-studio-accent rounded-full opacity-0 -translate-x-2 transition-all group-hover:opacity-100 group-hover:translate-x-0"></span>Galerie</a></li>
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
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-studio-accent hover:border-studio-accent transition-all transform hover:scale-110">📸</a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-studio-accent hover:border-studio-accent transition-all transform hover:scale-110">🎵</a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-studio-accent hover:border-studio-accent transition-all transform hover:scale-110">🎥</a>
                        </div>
                        <p class="text-sm text-gray-500 mb-2">Une question rapide ?</p>
                        <a href="mailto:hello@omade-studio.com" class="text-white font-medium hover:text-studio-accent transition-colors block">hello@omade-studio.com</a>
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
