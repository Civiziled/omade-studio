<x-layouts.app>
    <section class="min-h-screen bg-studio-dark relative z-10 flex items-center justify-center py-32">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-studio-accent/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="w-full max-w-md px-6 relative z-10">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-display font-bold text-white mb-2">Connexion</h1>
                <p class="text-gray-400">Accédez à votre espace pour réserver.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="bg-zinc-900/50 backdrop-blur-xl p-8 rounded-[2rem] border border-white/10 shadow-2xl">
                @csrf

                <!-- Email Address -->
                <div class="relative group mb-6">
                    <input type="email" name="email" id="email" required autofocus autocomplete="username" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent" value="{{ old('email') }}">
                    <label for="email" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Email</label>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="relative group mb-6">
                    <input type="password" name="password" id="password" required autocomplete="current-password" placeholder=" " class="peer w-full bg-zinc-900/50 border border-white/10 rounded-xl px-5 py-4 text-white focus:border-studio-accent focus:ring-1 focus:ring-studio-accent outline-none transition-all placeholder-transparent">
                    <label for="password" class="absolute left-5 top-4 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-studio-accent peer-focus:bg-studio-dark peer-focus:px-2 peer-valid:-top-2 peer-valid:text-xs peer-valid:bg-studio-dark peer-valid:px-2 rounded">Mot de passe</label>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-8">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-500 text-studio-accent shadow-sm focus:ring-studio-accent bg-transparent" name="remember">
                        <span class="ms-2 text-sm text-gray-400">Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-studio-accent hover:text-white transition-colors" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-studio-accent text-white font-bold text-lg py-4 rounded-xl hover:bg-white hover:text-studio-dark transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                    Se connecter
                </button>
                
                <p class="text-center mt-6 text-gray-400 text-sm">
                    Pas encore de compte ? <a href="{{ route('register') }}" class="text-white hover:text-studio-accent underline transition-colors">S'inscrire</a>
                </p>
            </form>
        </div>
    </section>
</x-layouts.app>
