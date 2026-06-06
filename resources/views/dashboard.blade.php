<x-layouts.app>
    <section class="min-h-screen bg-studio-dark relative z-10 pt-32 pb-20">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-studio-accent/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 w-full relative z-10">
            <div class="mb-12 flex justify-between items-end">
                <div>
                    <h2 class="text-sm font-bold tracking-[0.3em] text-studio-accent uppercase mb-2">Espace Client</h2>
                    <h1 class="text-4xl md:text-5xl font-display font-bold">Bonjour, {{ auth()->user()->name }}</h1>
                </div>
                <a href="{{ route('booking') }}" class="bg-studio-accent text-white px-6 py-3 rounded-full hover:bg-white hover:text-studio-dark transition-colors font-semibold shadow-lg">
                    Nouvelle Réservation
                </a>
            </div>

            <div class="bg-zinc-900/50 backdrop-blur-xl rounded-[2rem] border border-white/10 overflow-hidden shadow-2xl">
                <div class="p-8 border-b border-white/10">
                    <h3 class="text-xl font-semibold text-white">Mes Réservations</h3>
                </div>

                <div class="p-8">
                    @if($bookings->isEmpty())
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">🎤</div>
                            <p class="text-gray-400 mb-6">Vous n'avez pas encore de réservation.</p>
                            <a href="{{ route('booking') }}" class="text-studio-accent hover:text-white underline transition-colors">Réserver maintenant</a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="text-gray-500 text-sm border-b border-white/10">
                                        <th class="pb-4 font-medium">Date & Heure</th>
                                        <th class="pb-4 font-medium">Service</th>
                                        <th class="pb-4 font-medium">Prix</th>
                                        <th class="pb-4 font-medium">Statut</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    @foreach($bookings as $booking)
                                    <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                                        <td class="py-4">
                                            <div class="font-semibold text-white">{{ $booking->booking_date->format('d/m/Y') }}</div>
                                            <div class="text-gray-400">{{ $booking->start_time->format('H:i') }} - {{ $booking->end_time->format('H:i') }}</div>
                                        </td>
                                        <td class="py-4 text-gray-300">
                                            {{ Str::limit($booking->notes, 50) }}
                                        </td>
                                        <td class="py-4 text-white font-medium">
                                            {{ $booking->price ? $booking->price . ' €' : '-' }}
                                        </td>
                                        <td class="py-4">
                                            @if($booking->status === 'pending')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">En attente</span>
                                            @elseif($booking->status === 'confirmed' && $booking->payment_status === 'unpaid')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">Acceptée - À Payer</span>
                                            @elseif($booking->status === 'confirmed' && $booking->payment_status === 'paid')
                                                @if($booking->payment_method === 'cash')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">Caution Payée - Reste {{ $booking->price / 2 }} € sur place</span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-500/10 text-green-400 border border-green-500/20">Payée & Confirmée</span>
                                                @endif
                                            @elseif($booking->status === 'cancelled')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">Annulée</span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-500/10 text-gray-400 border border-gray-500/20">{{ ucfirst($booking->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:text-white transition-colors text-sm underline">
                        Me déconnecter de mon compte
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
