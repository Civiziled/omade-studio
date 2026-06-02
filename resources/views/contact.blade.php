<x-layouts.app>
    <section class="min-h-screen bg-studio-dark relative z-10 pt-32 pb-20 flex items-center">
        <!-- Background Elements -->
        <div class="absolute top-1/4 left-0 w-[500px] h-[500px] bg-studio-accent/10 rounded-full blur-[150px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                
                <!-- Left: Contact Info -->
                <div class="flex flex-col justify-center">
                    <h2 class="text-sm font-bold tracking-[0.3em] text-studio-accent uppercase mb-4 reveal-up">Contact</h2>
                    <h1 class="text-5xl md:text-7xl font-display font-bold leading-tight mb-8 reveal-up">
                        Parlons de<br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">votre projet.</span>
                    </h1>
                    <p class="text-xl text-gray-400 font-light mb-12 reveal-up">
                        Une question technique sur notre matériel ? Besoin d'un devis sur-mesure pour une production complète ? Écrivez-nous, notre équipe vous répondra dans les plus brefs délais.
                    </p>
                    
                    <div class="space-y-6 reveal-up">
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-studio-accent group-hover:border-studio-accent transition-all duration-300 transform group-hover:scale-110">📍</div>
                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wider mb-1">Notre Adresse</p>
                                <p class="text-lg text-white font-medium">Haachtsesteenweg 42, 1831 Diegem</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-studio-accent group-hover:border-studio-accent transition-all duration-300 transform group-hover:scale-110">✉️</div>
                            <div>
                                <h3 class="text-white font-bold text-xl mb-1">Email</h3>
                                <a href="mailto:contact@omade-studio.be" class="text-gray-400 hover:text-studio-accent transition-colors">contact@omade-studio.be</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-studio-accent group-hover:border-studio-accent transition-all duration-300 transform group-hover:scale-110">📸</div>
                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wider mb-1">Instagram</p>
                                <a href="https://instagram.com/Saws.97" target="_blank" class="text-lg text-white font-medium hover:text-studio-accent transition-colors">@Saws.97</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Form (Glassmorphism) -->
                <div class="relative reveal-up flex flex-col justify-center">
                    
                    <!-- Lottie Success Overlay -->
                    <div id="lottie-success" class="absolute inset-0 bg-studio-dark/95 backdrop-blur-md z-20 hidden flex-col items-center justify-center rounded-[2rem] border border-white/10">
                        <div id="lottie-container" class="w-48 h-48 mb-6"></div>
                        <p class="text-3xl font-display font-bold text-white mb-2">Message envoyé !</p>
                        <p class="text-gray-400">Nous vous recontactons très vite.</p>
                    </div>

                    <form id="contact-form" class="bg-zinc-900/40 backdrop-blur-xl p-8 md:p-12 rounded-[2rem] border border-white/10 shadow-2xl relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-studio-accent/20 rounded-full blur-[50px] pointer-events-none"></div>
                        @csrf
                        
                        <div class="space-y-8 relative z-10">
                            <div class="relative group">
                                <input type="text" name="name" id="name" required placeholder=" " class="peer w-full bg-transparent border-b-2 border-white/20 pb-4 text-white text-lg focus:border-studio-accent outline-none transition-colors placeholder-transparent">
                                <label for="name" class="absolute left-0 top-0 text-gray-500 text-lg transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-sm peer-focus:text-studio-accent peer-valid:-top-4 peer-valid:text-sm peer-valid:text-gray-400">Votre nom complet</label>
                            </div>
                            
                            <div class="relative group">
                                <input type="email" name="email" id="email" required placeholder=" " class="peer w-full bg-transparent border-b-2 border-white/20 pb-4 text-white text-lg focus:border-studio-accent outline-none transition-colors placeholder-transparent">
                                <label for="email" class="absolute left-0 top-0 text-gray-500 text-lg transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-sm peer-focus:text-studio-accent peer-valid:-top-4 peer-valid:text-sm peer-valid:text-gray-400">Votre adresse email</label>
                            </div>
                            
                            <div class="relative group pt-4">
                                <textarea name="message" id="message" rows="4" required placeholder=" " class="peer w-full bg-transparent border-b-2 border-white/20 pb-4 text-white text-lg focus:border-studio-accent outline-none transition-colors placeholder-transparent resize-none"></textarea>
                                <label for="message" class="absolute left-0 top-4 text-gray-500 text-lg transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-4 peer-focus:-top-4 peer-focus:text-sm peer-focus:text-studio-accent peer-valid:-top-4 peer-valid:text-sm peer-valid:text-gray-400">Comment pouvons-nous vous aider ?</label>
                            </div>
                            
                            <div id="contact-feedback" class="hidden text-sm text-red-400 bg-red-500/10 border border-red-500/20 p-4 rounded-xl"></div>
                            
                            <button type="submit" class="group flex items-center gap-6 mt-8">
                                <span class="w-16 h-16 rounded-full bg-white text-studio-dark flex items-center justify-center text-2xl group-hover:bg-studio-accent group-hover:text-white transition-all duration-500 transform group-hover:rotate-45 shadow-[0_0_30px_rgba(255,255,255,0.1)] group-hover:shadow-[0_0_30px_rgba(255,42,109,0.4)]">↗</span>
                                <span class="text-xl font-semibold text-white group-hover:text-studio-accent transition-colors">Envoyer la demande</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
