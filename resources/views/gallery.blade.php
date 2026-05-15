<x-layouts.app>
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

    <!-- Galerie Grid -->
    <section class="pb-32 bg-studio-dark relative z-10 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6 gallery-grid">
                @forelse($medias as $media)
                <div class="gallery-item relative group overflow-hidden rounded-3xl break-inside-avoid shadow-2xl opacity-0">
                    <img src="{{ Storage::url($media->file_path) }}" alt="{{ $media->title }}" class="w-full h-auto object-cover transform transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-studio-accent text-sm font-bold tracking-[0.2em] uppercase block mb-1">O'Made</span>
                            <span class="text-white text-2xl font-display font-semibold">{{ $media->title }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-32 text-gray-500 bg-zinc-900/50 rounded-3xl border border-white/5 backdrop-blur-md reveal-up">
                    <div class="text-6xl mb-6">📸</div>
                    <p class="text-2xl font-display font-light text-white mb-2">La galerie est en préparation.</p>
                    <p class="text-sm">Connectez-vous à l'administration pour ajouter vos photos !</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
