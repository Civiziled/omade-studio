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
    <section class="pb-32 bg-studio-dark relative z-10 min-h-screen flex items-center" x-data="{ lightboxOpen: false, lightboxSrc: '', lightboxType: 'image' }">
        <div class="w-full mx-auto px-0 md:px-6">
            <div class="swiper gallery-swiper w-full pt-10 pb-20">
                <div class="swiper-wrapper">
                    @forelse($medias as $media)
                    <div class="swiper-slide w-[50%] md:w-[30%] lg:w-[20%] cursor-pointer" @click="lightboxOpen = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = '{{ $media->type }}'">
                        <div class="relative group overflow-hidden rounded-2xl shadow-2xl aspect-[4/5]">
                            @if($media->type === 'video')
                                <video src="{{ Storage::url($media->file_path) }}" autoplay loop muted playsinline class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105"></video>
                            @else
                                <img src="{{ Storage::url($media->file_path) }}" alt="{{ $media->title }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105">
                            @endif
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white transform scale-50 group-hover:scale-100 transition-transform duration-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                </div>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-100 flex items-end p-6 pointer-events-none">
                                <div>
                                    <span class="text-studio-accent text-xs font-bold tracking-[0.2em] uppercase block mb-1">O'Made</span>
                                    <span class="text-white text-xl font-display font-semibold">{{ $media->title }}</span>
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
                <div class="swiper-button-prev hidden md:flex text-white !w-12 !h-12 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-studio-accent transition-all after:!text-base"></div>
                <div class="swiper-button-next hidden md:flex text-white !w-12 !h-12 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-studio-accent transition-all after:!text-base"></div>
            </div>
        </div>

        <!-- Lightbox -->
        <div x-show="lightboxOpen" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-sm" x-transition.opacity duration.500ms x-cloak>
            <button @click="lightboxOpen = false" class="absolute top-6 right-6 w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-white hover:bg-studio-accent transition-colors z-50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="relative max-w-7xl max-h-[90vh] w-full p-4 flex items-center justify-center" @click.away="lightboxOpen = false">
                <template x-if="lightboxType === 'video'">
                    <video :src="lightboxSrc" autoplay controls class="max-w-full max-h-[85vh] rounded-lg shadow-2xl"></video>
                </template>
                <template x-if="lightboxType !== 'video'">
                    <img :src="lightboxSrc" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
                </template>
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
