<x-layouts.app>
    <section class="min-h-screen bg-studio-dark relative z-10 pt-32 pb-20 flex items-center">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-studio-accent/10 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-purple-900/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                
                <!-- Left: Text content -->
                <div class="order-2 lg:order-1">
                    <h2 class="text-sm font-bold tracking-[0.3em] text-studio-accent uppercase mb-4 reveal-up">Réservation</h2>
                    <h1 class="text-5xl md:text-7xl font-display font-bold leading-tight mb-8 reveal-up">
                        Bloquez votre session.<br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">Créez l'histoire.</span>
                    </h1>
                    <p class="text-xl text-gray-400 font-light mb-12 reveal-up">
                        Que vous ayez besoin d'une simple prise de voix ou de bloquer le studio pour la production complète d'un album, notre équipe est prête à vous accueillir dans des conditions optimales.
                    </p>
                    
                    <div class="space-y-6 reveal-up">
                        <div class="flex items-center gap-4 bg-zinc-900/50 p-6 rounded-2xl border border-white/5 backdrop-blur-sm">
                            <div class="w-12 h-12 bg-studio-accent/20 text-studio-accent rounded-full flex items-center justify-center text-xl">🎙️</div>
                            <div>
                                <h4 class="text-white font-semibold">Équipement Premium</h4>
                                <p class="text-gray-400 text-sm">Micros vintage & consoles analogiques.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 bg-zinc-900/50 p-6 rounded-2xl border border-white/5 backdrop-blur-sm">
                            <div class="w-12 h-12 bg-studio-accent/20 text-studio-accent rounded-full flex items-center justify-center text-xl">🎛️</div>
                            <div>
                                <h4 class="text-white font-semibold">Ingénieurs Expérimentés</h4>
                                <p class="text-gray-400 text-sm">Assistance technique incluse sur demande.</p>
                            </div>
                        </div>

                        <!-- Ligne de contact rapide -->
                        <div class="pt-6 border-t border-white/10 flex flex-col gap-4">
                            <p class="text-sm text-gray-500 uppercase tracking-widest font-semibold">Besoin d'aide avant de réserver ?</p>
                            <div class="flex items-center gap-6">
                                <a href="mailto:contact@omade-studio.be" class="group flex items-center gap-3 hover:text-studio-accent transition-colors">
                                    <span class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center group-hover:bg-studio-accent/20 transition-colors">✉️</span>
                                    <span class="text-white font-medium">contact@omade-studio.be</span>
                                </a>
                                <a href="https://instagram.com/Saws.97" target="_blank" class="group flex items-center gap-3 hover:text-studio-accent transition-colors">
                                    <span class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center group-hover:bg-studio-accent/20 transition-colors">📸</span>
                                    <span class="text-white font-medium">@Saws.97</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Form (Glassmorphism) -->
                <div class="order-1 lg:order-2 reveal-up">
                    <form id="booking-form" enctype="multipart/form-data" class="bg-white/5 backdrop-blur-xl p-8 md:p-10 rounded-[2rem] shadow-2xl border border-white/10 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-studio-accent to-purple-600"></div>
                        @csrf
                        
                        <div class="space-y-6">
                            <!-- Ligne 1 : Utilisateur connecté -->
                            <div class="bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-400">Réservation au nom de :</p>
                                    <p class="text-white font-semibold">{{ auth()->user()->name }} ({{ auth()->user()->email }})</p>
                                </div>
                                <div class="text-studio-accent">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                            </div>

                            <!-- Ligne 2 : Insta -->
                            <div class="grid grid-cols-1 gap-6">
                                <div class="relative group">
                                    <input type="text" name="instagram_handle" id="instagram_handle" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                                    <label for="instagram_handle" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Instagram (optionnel)</label>
                                </div>
                            </div>
                            
                            <!-- Ligne 3 -->
                            <div class="relative group">
                                <input type="date" name="booking_date" id="booking_date" required placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all [color-scheme:dark]">
                                <label for="booking_date" class="absolute left-5 -top-2 text-xs text-studio-accent bg-studio-dark px-2 rounded">Date de session</label>
                            </div>

                            <!-- Ligne 3 -->
                            <div class="grid grid-cols-2 gap-6">
                                <div class="relative group">
                                    <input type="time" name="start_time" id="start_time" required class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all [color-scheme:dark]">
                                    <label for="start_time" class="absolute left-5 -top-2 text-xs text-studio-accent bg-studio-dark px-2 rounded">Heure de début</label>
                                </div>
                                <div class="relative group">
                                    <input type="time" name="end_time" id="end_time" required class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all [color-scheme:dark]">
                                    <label for="end_time" class="absolute left-5 -top-2 text-xs text-studio-accent bg-studio-dark px-2 rounded">Heure de fin</label>
                                </div>
                            </div>

                            <!-- Ligne 4 : Service -->
                            <div class="relative group">
                                <select name="service" id="service" required class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all appearance-none cursor-pointer">
                                    <option value="" disabled {{ !request('service') ? 'selected' : '' }} hidden>Sélectionnez un service...</option>
                                    <option value="Enregistrement (35€/h)" class="bg-studio-dark text-white" {{ request('service') == 'Enregistrement (35€/h)' ? 'selected' : '' }}>Enregistrement - 35€/heure</option>
                                    <option value="Mastering (50€)" class="bg-studio-dark text-white" {{ request('service') == 'Mastering (50€)' ? 'selected' : '' }}>Mastering Professionnel - 50€</option>
                                    <option value="Mixage 100€ (Instru WAV + Voix)" class="bg-studio-dark text-white" {{ request('service') == 'Mixage 100€ (Instru WAV + Voix)' ? 'selected' : '' }}>Mixage - Instru WAV + Voix (100€)</option>
                                    <option value="Mixage 190€ (Pistes Séparées + Voix)" class="bg-studio-dark text-white" {{ request('service') == 'Mixage 190€ (Pistes Séparées + Voix)' ? 'selected' : '' }}>Mixage - Pistes Séparées + Voix (190€)</option>
                                    <option value="Mixage 300€ (Instru Sur Mesure + Voix)" class="bg-studio-dark text-white" {{ request('service') == 'Mixage 300€ (Instru Sur Mesure + Voix)' ? 'selected' : '' }}>Mixage Premium - Instru Sur Mesure + Voix (300€)</option>
                                </select>
                                <label for="service" class="absolute left-5 -top-2 text-xs text-studio-accent bg-studio-dark px-2 rounded">Service souhaité</label>
                                <!-- Custom arrow for select -->
                                <div class="absolute inset-y-0 right-5 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>

                            <!-- Ligne 5 : Fichier Musique -->
                            <div class="relative group">
                                <!-- On enlève "peer" etc pour le type="file" car le style est géré différemment -->
                                <input type="file" name="music_file" id="music_file" accept="audio/*" class="w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-studio-accent file:text-white hover:file:bg-white hover:file:text-studio-dark">
                                <p class="text-gray-500 text-xs mt-2 ml-2">Uploadez votre maquette / instru (WAV, MP3, M4A) - Max 20Mo</p>
                            </div>

                            <!-- Ligne 5 -->
                            <div class="relative group">
                                <textarea name="notes" id="notes" rows="3" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent resize-none"></textarea>
                                <label for="notes" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Besoins spécifiques (matériel, ingé son...)</label>
                            </div>
                        </div>
                        
                        <div id="booking-feedback" class="hidden mt-6 text-sm px-4 py-3 rounded-xl"></div>
                        
                        <button type="submit" class="mt-8 w-full bg-white text-studio-dark font-bold text-lg py-4 rounded-xl hover:bg-studio-accent hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                            Confirmer la demande
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </section>

</x-layouts.app>
