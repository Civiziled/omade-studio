<x-layouts.app>
    @section('title', 'Tarifs - O\'Made Studio')

    <section class="min-h-screen bg-studio-dark relative z-10 pt-32 pb-20 flex flex-col items-center">
        <!-- Tarifs Section -->
        <div class="w-full max-w-7xl mx-auto px-6">
            <div class="text-center mb-16 reveal-up">
                <h2 class="text-sm font-bold tracking-[0.3em] text-studio-accent text-glow-accent uppercase mb-4">Nos Tarifs</h2>
                <h3 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">Mixage & Mastering</h3>
                <p class="text-gray-400 max-w-2xl mx-auto">Des forfaits adaptés à vos besoins pour un rendu professionnel, prêts pour les plateformes de streaming.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- 100€ -->
                <div class="bg-zinc-900/50 p-8 rounded-[2rem] border border-white/5 backdrop-blur-sm reveal-up hover:border-studio-accent/30 transition-all flex flex-col">
                    <div class="text-studio-accent text-glow-accent text-sm font-bold tracking-widest uppercase mb-2">Mixage</div>
                    <div class="text-5xl font-display font-bold text-white mb-4">100€</div>
                    <h4 class="text-xl font-bold text-white mb-6">Instru WAV + Pistes Voix</h4>
                    <div class="text-gray-400 text-sm space-y-4 flex-grow">
                        <p>Tu fournis ton instrumental en version WAV — téléchargé depuis YouTube ou acheté sur une plateforme de beats.</p>
                        <p>Tu nous envoies tes pistes vocales brutes, <strong class="text-white font-medium">sans effets</strong>, séparées les unes des autres.</p>
                        <p>On s'occupe du mixage complet.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('booking', ['service' => 'Mixage 100€ (Instru WAV + Voix)']) }}" class="block w-full text-center bg-white/5 hover:bg-studio-accent text-white font-bold py-3 rounded-xl transition-all border border-white/10 hover:border-studio-accent">Réserver ce forfait</a>
                    </div>
                </div>

                <!-- 190€ -->
                <div class="relative bg-zinc-900/80 p-8 rounded-[2rem] border border-studio-accent/50 shadow-[0_0_30px_rgba(205,127,50,0.1)] backdrop-blur-sm reveal-up transform md:-translate-y-4 flex flex-col">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-studio-accent text-white text-xs font-bold px-4 py-1 rounded-full uppercase tracking-widest whitespace-nowrap">Le plus choisi</div>
                    <div class="text-studio-accent text-glow-accent text-sm font-bold tracking-widest uppercase mb-2">Mixage</div>
                    <div class="text-5xl font-display font-bold text-white mb-4">190€</div>
                    <h4 class="text-xl font-bold text-white mb-6">Pistes Instru + Pistes Voix</h4>
                    <div class="text-gray-400 text-sm space-y-4 flex-grow">
                        <p>Tu fournis ton instrumental décomposé en plusieurs pistes séparées : kick, basse, mélodies, pads, etc.</p>
                        <p>Associé à tes pistes vocales brutes et sans effets, ce format nous donne un contrôle total sur chaque élément du mix.</p>
                        <p>Résultat : un son plus précis, plus propre, plus professionnel.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('booking', ['service' => 'Mixage 190€ (Pistes Séparées + Voix)']) }}" class="block w-full text-center bg-studio-accent hover:bg-white hover:text-studio-dark text-white font-bold py-3 rounded-xl transition-all shadow-lg">Réserver ce forfait</a>
                    </div>
                </div>

                <!-- 300€ -->
                <div class="bg-zinc-900/50 p-8 rounded-[2rem] border border-white/5 backdrop-blur-sm reveal-up hover:border-studio-accent/30 transition-all flex flex-col">
                    <div class="text-studio-accent text-glow-accent text-sm font-bold tracking-widest uppercase mb-2">Mixage • Formule Premium</div>
                    <div class="text-5xl font-display font-bold text-white mb-4">300€</div>
                    <h4 class="text-xl font-bold text-white mb-6">Instru Sur Mesure + Pistes Voix</h4>
                    <div class="text-gray-400 text-sm space-y-4 flex-grow">
                        <p>Un beatmaker O'made compose pour toi un instrumental 100% original et personnalisé selon ton univers.</p>
                        <p>Tu poses tes voix chez toi ou dans un studio d'enregistrement, puis tu nous envoies tes pistes brutes séparées et sans effets.</p>
                        <p>On gère le mixage complet pour un rendu sur-mesure de A à Z.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('booking', ['service' => 'Mixage 300€ (Instru Sur Mesure + Voix)']) }}" class="block w-full text-center bg-white/5 hover:bg-studio-accent text-white font-bold py-3 rounded-xl transition-all border border-white/10 hover:border-studio-accent">Réserver ce forfait</a>
                    </div>
                </div>
            </div>

            <!-- 35€ Enregistrement (Centré) -->
            <div class="mt-8 max-w-3xl mx-auto bg-zinc-900/50 p-8 md:p-12 rounded-[2rem] border border-white/5 backdrop-blur-sm reveal-up hover:border-studio-accent/30 transition-all text-center">
                <div class="text-studio-accent text-glow-accent text-sm font-bold tracking-widest uppercase mb-2">Enregistrement</div>
                <div class="text-6xl font-display font-bold text-white mb-4">35€ <span class="text-2xl text-gray-500 font-light">/heure</span></div>
                <h4 class="text-2xl font-bold text-white mb-8">Session Studio • Pré-Mix Inclus</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                    <div>
                        <h5 class="text-studio-accent text-glow-accent font-bold text-sm tracking-widest uppercase mb-3">La Session</h5>
                        <p class="text-gray-400 text-sm">Enregistre dans une cabine insonorisée, avec un équipement professionnel, pour capturer ta voix avec une qualité studio irréprochable.</p>
                    </div>
                    <div>
                        <h5 class="text-studio-accent text-glow-accent font-bold text-sm tracking-widest uppercase mb-3">Le Pré-Mix Inclus</h5>
                        <p class="text-gray-400 text-sm">À la fin de ta session, tu repars avec un fichier audible et travaillé — nettoyé, équilibré, prêt à écouter. Ce n'est pas le mixage final, mais une maquette propre.</p>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ route('booking', ['service' => 'Enregistrement (35€/h)']) }}" class="inline-block bg-white/5 hover:bg-studio-accent text-white font-bold px-8 py-3 rounded-xl transition-all border border-white/10 hover:border-studio-accent">Réserver une session d'enregistrement</a>
                </div>
            </div>

            <!-- 50€ Mastering (Centré en bas) -->
            <div class="mt-8 max-w-3xl mx-auto bg-zinc-900/50 p-8 rounded-[2rem] border border-white/5 backdrop-blur-sm reveal-up text-center hover:border-studio-accent/30 transition-all">
                <div class="text-studio-accent text-glow-accent text-sm font-bold tracking-widest uppercase mb-2">Mastering</div>
                <div class="text-5xl font-display font-bold text-white mb-4">50€</div>
                <h4 class="text-xl font-bold text-white mb-4">Mastering Professionnel</h4>
                <p class="text-gray-400 text-sm">Dernière étape avant ta sortie. On traite ton morceau pour lui donner sa couleur finale : équilibre sonore, loudness optimisé et rendu homogène — prêt à être balancé sur Spotify, Apple Music, Deezer et toutes les plateformes.</p>
                <div class="mt-8">
                    <a href="{{ route('booking', ['service' => 'Mastering (50€)']) }}" class="inline-block bg-white/5 hover:bg-studio-accent text-white font-bold px-8 py-3 rounded-xl transition-all border border-white/10 hover:border-studio-accent">Réserver un mastering</a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
