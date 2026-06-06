<x-layouts.app>
    <section class="min-h-screen pt-32 pb-20 flex items-center justify-center px-4">
        <div class="max-w-xl w-full bg-zinc-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 md:p-12 text-center">
            
            <div class="w-20 h-20 bg-green-500/20 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            
            <h1 class="text-3xl font-display font-bold text-white mb-4">Paiement Réussi !</h1>
            <p class="text-gray-400 mb-8">Merci {{ $booking->client_name }}. Votre session au studio est maintenant confirmée et réservée.</p>
            
            <div class="bg-black/50 border border-white/5 rounded-2xl p-6 text-left mb-8 space-y-4">
                <h3 class="text-white font-semibold mb-4 border-b border-white/10 pb-2">Récapitulatif de votre session</h3>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Date</span>
                    <span class="text-white">{{ $booking->booking_date->format('d/m/Y') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Horaires</span>
                    <span class="text-white">{{ $booking->start_time->format('H:i') }} - {{ $booking->end_time->format('H:i') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Montant payé</span>
                    <span class="text-studio-accent font-bold">{{ $booking->price }} €</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Statut de la transaction</span>
                    <span class="text-green-500">Approuvée</span>
                </div>
            </div>
            
            <a href="{{ route('home') }}" class="inline-block bg-white text-studio-dark font-semibold px-8 py-3 rounded-full hover:bg-studio-accent hover:text-white transition-all">Retour à l'accueil</a>
        </div>
    </section>
</x-layouts.app>
