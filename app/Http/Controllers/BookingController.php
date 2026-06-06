<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'instagram_handle' => 'nullable|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'service' => 'required|string',
            'music_file' => 'nullable|file|mimes:mp3,wav,m4a,ogg|max:20480', // 20MB max
            'stems_files' => 'nullable|array',
            'stems_files.*' => 'file|mimes:mp3,wav,m4a,ogg,zip|max:51200', // 50MB max per file for stems
            'notes' => 'nullable|string',
            'payment_method' => 'required|in:card,cash',
        ]);

        // Vérifier les overbookings (chevauchement de créneaux)
        $isOverbooked = Booking::where('booking_date', $validated['booking_date'])
            ->where('status', '!=', 'cancelled')
            ->where('start_time', '<', $validated['end_time'])
            ->where('end_time', '>', $validated['start_time'])
            ->exists();

        if ($isOverbooked) {
            return response()->json(['errors' => ['start_time' => ['Désolé, ce créneau horaire est déjà réservé. Veuillez choisir une autre date ou heure.']]], 422);
        }

        // Gérer l'upload du fichier audio principal
        $musicFilePath = null;
        if ($request->hasFile('music_file')) {
            $musicFilePath = $request->file('music_file')->store('bookings/music', 'public');
        }

        // Gérer l'upload des pistes séparées (stems)
        $stemsFilePaths = [];
        if ($request->hasFile('stems_files')) {
            foreach ($request->file('stems_files') as $file) {
                $stemsFilePaths[] = $file->store('bookings/stems', 'public');
            }
        }

        // Formater les notes pour inclure le service choisi
        $notes = "Service sélectionné : " . $validated['service'];

        if (!empty($validated['notes'])) {
            $notes .= "\n\nCommentaire du client :\n" . $validated['notes'];
        }
        $validated['notes'] = $notes;

        $user = auth()->user();

        $booking = Booking::create([
            'user_id' => $user->id,
            'client_name' => $user->name,
            'client_email' => $user->email,
            'instagram_handle' => $validated['instagram_handle'],
            'booking_date' => $validated['booking_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => 'pending',
            'payment_method' => $validated['payment_method'],
            'notes' => $validated['notes'],
            'music_file_path' => $musicFilePath,
            'stems_file_paths' => !empty($stemsFilePaths) ? $stemsFilePaths : null,
        ]);

        try {
            // Envoyer l'email au client
            \Illuminate\Support\Facades\Mail::to($booking->client_email)
                ->send(new \App\Mail\BookingPendingClientMail($booking));

            // Envoyer l'email au gérant (admin)
            \Illuminate\Support\Facades\Mail::to('contact@omade-studio.be')
                ->send(new \App\Mail\BookingPendingManagerMail($booking));
        } catch (\Exception $e) {
            // On ignore l'erreur d'envoi d'email pour ne pas bloquer le client si le serveur SMTP a un souci
            \Illuminate\Support\Facades\Log::error('Erreur d\'envoi d\'email de réservation: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Réservation enregistrée avec succès. Notre équipe vous contactera sous peu.'], 201);
    }
}
