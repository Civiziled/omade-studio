<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #111; color: #4CAF50; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 8px 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Paiement Reçu !</h2>
        </div>
        <div class="content">
            <p>Le client <strong>{{ $booking->client_name }}</strong> a procédé au paiement de sa session via Stripe.</p>
            
            <div style="background:#eee; padding:15px; border-radius:5px; margin:20px 0;">
                <p style="margin:0;"><strong>Date :</strong> {{ $booking->booking_date->format('d/m/Y') }}</p>
                <p style="margin:0;"><strong>Horaires :</strong> {{ $booking->start_time->format('H:i') }} - {{ $booking->end_time->format('H:i') }}</p>
                <p style="margin:0;"><strong>Montant payé :</strong> {{ $booking->price }} €</p>
            </div>
            
            <p>La réservation est désormais entièrement confirmée. Vous pouvez voir les détails complets dans le panel d'administration.</p>
            <a href="{{ url('/admin/bookings') }}" style="display:inline-block; padding:10px 20px; background:#111; color:#fff; text-decoration:none; border-radius:5px;">Ouvrir le Panel</a>
        </div>
    </div>
</body>
</html>
