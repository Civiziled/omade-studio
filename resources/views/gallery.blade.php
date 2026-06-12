<x-layouts.app>
    @viteReactRefresh
    @vite(['resources/js/react-gallery.tsx'])

    <!-- Galerie Header -->
    <section class="pt-40 pb-20 relative z-10 bg-studio-dark overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-studio-accent/20 via-studio-dark to-studio-dark pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <h1 class="text-6xl md:text-8xl font-display font-bold uppercase tracking-tighter mb-6 reveal-up">
                Notre <span class="text-transparent bg-clip-text bg-gradient-to-r from-studio-accent to-purple-500">Espace.</span>
            </h1>
            <p class="text-xl text-gray-400 font-light max-w-2xl mx-auto reveal-up">Découvrez l'environnement unique où la magie opère. Un lieu pensé pour l'inspiration absolue.</p>
        </div>
    </section>

    <!-- React Gallery Root -->
    <div id="react-gallery-root" data-medias="{{ json_encode($medias) }}" class="min-h-screen bg-studio-dark pb-32"></div>

</x-layouts.app>
