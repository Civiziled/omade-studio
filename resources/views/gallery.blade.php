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

    <!-- Galerie Interactive -->
    <section class="pb-32 bg-studio-dark relative z-10 min-h-screen flex items-center">
        <div class="w-full mx-auto px-0 md:px-6">
            <div class="swiper gallery-swiper w-full pt-10 pb-20">
                <div class="swiper-wrapper">
                    @forelse($medias as $media)
                    <div class="swiper-slide w-[80%] md:w-[60%] lg:w-[40%]">
                        <div class="relative group overflow-hidden rounded-3xl shadow-2xl aspect-[4/5] md:aspect-square">
                            @if($media->type === 'video')
                                <video src="{{ Storage::url($media->file_path) }}" autoplay loop muted playsinline class="w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-110"></video>
                            @else
                                <img src="{{ Storage::url($media->file_path) }}" alt="{{ $media->title }}" class="w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-110">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <span class="text-studio-accent text-sm font-bold tracking-[0.2em] uppercase block mb-1">O'Made</span>
                                    <span class="text-white text-2xl md:text-3xl font-display font-semibold">{{ $media->title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="w-full text-center py-32 text-gray-500 bg-zinc-900/50 rounded-3xl border border-white/5 backdrop-blur-md">
                        <div class="text-6xl mb-6">📸</div>
                        <p class="text-2xl font-display font-light text-white mb-2">La galerie est en préparation.</p>
                        <p class="text-sm">Connectez-vous à l'administration pour ajouter vos photos !</p>
                    </div>
                    @endforelse
                </div>
                <!-- Pagination & Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev hidden md:flex text-white !w-14 !h-14 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-studio-accent transition-all after:!text-lg"></div>
                <div class="swiper-button-next hidden md:flex text-white !w-14 !h-14 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-studio-accent transition-all after:!text-lg"></div>
            </div>
        </div>
    </section>

    <!-- Swiper Init Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper !== 'undefined') {
                new Swiper('.gallery-swiper', {
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    coverflowEffect: {
                        rotate: 20,
                        stretch: 0,
                        depth: 200,
                        modifier: 1,
                        slideShadows: true,
                    },
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            }
        });
    </script>
</x-layouts.app>
