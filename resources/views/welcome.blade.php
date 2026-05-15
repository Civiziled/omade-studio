<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-screen flex flex-col items-center justify-center text-center px-4">
        <div class="hero-content z-10 mt-16">
            <h1 class="hero-title text-7xl md:text-9xl font-display font-bold uppercase tracking-tighter mb-6 opacity-0 translate-y-12">
                <span class="block text-3xl md:text-5xl font-light tracking-widest text-gray-400 mb-4 lowercase">Bienvenue chez</span>
                O'Made <span class="text-transparent bg-clip-text bg-gradient-to-r from-studio-accent to-purple-500">Studio.</span>
            </h1>
            <p class="hero-subtitle text-xl md:text-2xl text-gray-300 font-light max-w-3xl mx-auto mb-10 opacity-0 translate-y-8">
                L'art du son repensé. Un espace créatif hybride alliant chaleur analogique et précision numérique, conçu pour révéler l'essence de votre musique.
            </p>
            <div class="hero-cta opacity-0 flex gap-6 justify-center">
                <a href="#histoire" class="inline-block bg-white text-studio-dark font-semibold px-8 py-4 rounded-full hover:bg-gray-200 transition-all duration-300">
                    Notre Histoire
                </a>
                <a href="{{ route('booking') }}" class="inline-block border border-studio-accent text-studio-accent font-semibold px-8 py-4 rounded-full hover:bg-studio-accent hover:text-white transition-all duration-300">
                    Réserver
                </a>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 opacity-50 animate-bounce">
            <div class="w-[30px] h-[50px] border-2 border-white rounded-full flex justify-center p-2">
                <div class="w-1 h-3 bg-white rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- Histoire Section -->
    <section id="histoire" class="py-32 bg-studio-dark relative z-10 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1 relative group rounded-3xl overflow-hidden image-reveal">
                <div class="absolute inset-0 bg-studio-accent mix-blend-overlay opacity-20 group-hover:opacity-0 transition-opacity duration-700 z-10"></div>
                <img src="https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?q=80&w=2070&auto=format&fit=crop" alt="Console O'Made" class="w-full h-full object-cover transform scale-105 group-hover:scale-100 transition-transform duration-1000 grayscale group-hover:grayscale-0">
            </div>
            
            <div class="order-1 lg:order-2 space-y-8">
                <h2 class="text-sm font-bold tracking-[0.3em] text-studio-accent uppercase reveal-up">La Genèse</h2>
                <h3 class="text-4xl md:text-5xl font-display font-semibold leading-tight reveal-up">Né d'une passion obsessionnelle pour la perfection sonore.</h3>
                <div class="text-gray-400 space-y-6 text-lg font-light reveal-up">
                    <p>O'Made n'est pas qu'un simple studio d'enregistrement. C'est un sanctuaire dédié aux artistes qui refusent les compromis. Fondé sur la conviction que chaque détail compte, notre espace a été pensé acoustiquement et technologiquement pour capturer l'émotion pure.</p>
                    <p>De nos microphones vintage soigneusement restaurés à notre console analogique de légende, chaque pièce de notre équipement a une histoire, prête à se mêler à la vôtre.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-32 relative z-10 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-sm font-bold tracking-[0.3em] text-studio-accent uppercase mb-4 reveal-up">Notre Expertise</h2>
                <h3 class="text-4xl md:text-6xl font-display font-bold reveal-up">Forger votre signature.</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 services-grid">
                <!-- Service 1 -->
                <div class="service-card bg-zinc-900/50 backdrop-blur-xl border border-white/10 p-10 rounded-3xl hover:bg-zinc-800/50 transition-colors group">
                    <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center mb-8 text-2xl group-hover:scale-110 transition-transform group-hover:bg-studio-accent group-hover:text-white">🎙️</div>
                    <h4 class="text-2xl font-display font-semibold mb-4 text-white">Enregistrement</h4>
                    <p class="text-gray-400 font-light leading-relaxed">Cabines insonorisées à l'acoustique modulable. Une collection de micros premium pour capter chaque nuance de votre voix et de vos instruments.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card bg-zinc-900/50 backdrop-blur-xl border border-white/10 p-10 rounded-3xl hover:bg-zinc-800/50 transition-colors group translate-y-0 md:translate-y-8">
                    <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center mb-8 text-2xl group-hover:scale-110 transition-transform group-hover:bg-studio-accent group-hover:text-white">🎛️</div>
                    <h4 class="text-2xl font-display font-semibold mb-4 text-white">Mixage</h4>
                    <p class="text-gray-400 font-light leading-relaxed">L'équilibre parfait entre chaleur analogique et flexibilité numérique. Nous donnons profondeur, largeur et impact à vos pistes.</p>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card bg-zinc-900/50 backdrop-blur-xl border border-white/10 p-10 rounded-3xl hover:bg-zinc-800/50 transition-colors group">
                    <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center mb-8 text-2xl group-hover:scale-110 transition-transform group-hover:bg-studio-accent group-hover:text-white">💽</div>
                    <h4 class="text-2xl font-display font-semibold mb-4 text-white">Mastering</h4>
                    <p class="text-gray-400 font-light leading-relaxed">L'étape finale cruciale. Un polissage sur-mesure pour garantir que votre morceau sonne massivement sur toutes les plateformes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-32 relative z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-black to-studio-dark"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-studio-accent/20 rounded-full blur-[120px] pointer-events-none"></div>
        
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-5xl md:text-7xl font-display font-bold mb-8 reveal-up">Prêt à créer l'exceptionnel ?</h2>
            <p class="text-xl text-gray-400 font-light mb-12 reveal-up">Rejoignez les artistes qui ont choisi O'Made pour donner vie à leur vision.</p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center reveal-up">
                <a href="{{ route('booking') }}" class="bg-studio-accent text-white font-semibold px-10 py-5 rounded-full hover:bg-white hover:text-studio-dark transition-all duration-300 text-lg transform hover:scale-105 shadow-[0_0_40px_rgba(255,42,109,0.4)]">
                    Réserver le Studio
                </a>
                <a href="{{ route('gallery') }}" class="bg-zinc-800 text-white font-semibold px-10 py-5 rounded-full hover:bg-zinc-700 transition-all duration-300 text-lg">
                    Voir la Galerie
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
