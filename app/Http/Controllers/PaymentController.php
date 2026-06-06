<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingPaidManagerMail;

class PaymentController extends Controller
{
    public function success(Request $request, Booking $booking)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            abort(404);
        }

        if ($booking->payment_status === 'paid') {
            return view('booking-success', compact('booking'));
        }

        $stripe = new StripeClient(config('services.stripe.secret'));
        
        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                $booking->update([
                    'payment_status' => 'paid',
                    'stripe_payment_intent' => $session->payment_intent,
                ]);

                // Envoyer un mail au gérant pour dire que c'est payé
                Mail::to('contact@omade-studio.be')->send(new BookingPaidManagerMail($booking));

                return view('booking-success', compact('booking'));
            }
        } catch (\Exception $e) {
            abort(404);
        }

        abort(404);
    }
}
