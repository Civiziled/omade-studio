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
                                <a href="tel:+3221234567" class="group flex items-center gap-3 hover:text-studio-accent transition-colors">
                                    <span class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center group-hover:bg-studio-accent/20 transition-colors">📞</span>
                                    <span class="text-white font-medium">+32 2 123 45 67</span>
                                </a>
                                <a href="https://instagram.com/omade.studio" target="_blank" class="group flex items-center gap-3 hover:text-studio-accent transition-colors">
                                    <span class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center group-hover:bg-studio-accent/20 transition-colors">📸</span>
                                    <span class="text-white font-medium">@omade.studio</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Form (Glassmorphism) -->
                <div class="order-1 lg:order-2 reveal-up">
                    <form id="booking-form" class="bg-white/5 backdrop-blur-xl p-8 md:p-10 rounded-[2rem] shadow-2xl border border-white/10 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-studio-accent to-purple-600"></div>
                        @csrf
                        
                        <div class="space-y-6">
                            <!-- Ligne 1 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative group">
                                    <input type="text" name="client_name" id="client_name" required placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                                    <label for="client_name" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Nom complet</label>
                                </div>
                                <div class="relative group">
                                    <input type="email" name="client_email" id="client_email" required placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                                    <label for="client_email" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Email</label>
                                </div>
                            </div>

                            <!-- Ligne 2 : Tel & Insta -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative group">
                                    <input type="tel" name="client_phone" id="client_phone" required placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                                    <label for="client_phone" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Numéro de téléphone</label>
                                </div>
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

                            <!-- Ligne 4 -->
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
