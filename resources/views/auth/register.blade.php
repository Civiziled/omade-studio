<x-layouts.app>
    <section class="min-h-screen bg-studio-dark relative z-10 flex items-center justify-center py-32">
        <!-- Background Elements -->
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-studio-accent/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="w-full max-w-md px-6 relative z-10">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-display font-bold text-white mb-2">Inscription</h1>
                <p class="text-gray-400">Rejoignez le studio pour réserver vos sessions.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="bg-zinc-900/50 backdrop-blur-xl p-8 rounded-[2rem] border border-white/10 shadow-2xl">
                @csrf

                <!-- Name -->
                <div class="relative group mb-6">
                    <input type="text" name="name" id="name" required autofocus autocomplete="name" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent" value="{{ old('name') }}">
                    <label for="name" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Nom complet</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Email Address -->
                <div class="relative group mb-6">
                    <input type="email" name="email" id="email" required autocomplete="username" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent" value="{{ old('email') }}">
                    <label for="email" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Email</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="relative group mb-6">
                    <input type="password" name="password" id="password" required autocomplete="new-password" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                    <label for="password" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Mot de passe</label>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div class="relative group mb-8">
                    <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                    <label for="password_confirmation" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Confirmer le mot de passe</label>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>

                <button type="submit" class="w-full bg-studio-accent text-white font-bold text-lg py-4 rounded-xl hover:bg-white hover:text-studio-dark transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                    Créer mon compte
                </button>
                
                <p class="text-center mt-6 text-gray-400 text-sm">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-white hover:text-studio-accent underline transition-colors">Se connecter</a>
                </p>
            </form>
        </div>
    </section>
</x-layouts.app>
