<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'instagram_handle' => 'nullable|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'service' => 'required|string',
            'music_file' => 'nullable|file|mimes:mp3,wav,m4a,ogg|max:20480', // 20MB max
            'notes' => 'nullable|string',
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

        // Gérer l'upload du fichier audio
        $musicFilePath = null;
        if ($request->hasFile('music_file')) {
            $musicFilePath = $request->file('music_file')->store('bookings/music', 'public');
        }

        // Formater les notes pour inclure le service choisi
        $notes = "Service sélectionné : " . $validated['service'];

        if (!empty($validated['notes'])) {
            $notes .= "\n\nCommentaire du client :\n" . $validated['notes'];
        }
        $validated['notes'] = $notes;

        Booking::create([
            'client_name' => $validated['client_name'],
            'client_email' => $validated['client_email'],
            'instagram_handle' => $validated['instagram_handle'],
            'booking_date' => $validated['booking_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => 'pending',
            'notes' => $validated['notes'],
            'music_file_path' => $musicFilePath,
        ]);

        return response()->json(['message' => 'Réservation enregistrée avec succès. Notre équipe vous contactera sous peu.'], 201);
    }
}
