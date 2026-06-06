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
                @if($booking->payment_method === 'cash')
                    <p style="margin:0;"><strong>Acompte payé (Stripe) :</strong> {{ $booking->price / 2 }} €</p>
                    <p style="margin:0; color:#cd7f32; font-weight:bold;">Reste à encaisser sur place : {{ $booking->price / 2 }} €</p>
                @else
                    <p style="margin:0;"><strong>Montant payé (Stripe) :</strong> {{ $booking->price }} €</p>
                @endif
            </div>
            
            @if($booking->payment_method === 'cash')
                <p>La réservation est désormais confirmée. <strong>N'oubliez pas d'encaisser le reste en espèces le jour de la session.</strong> Vous pouvez voir les détails complets dans le panel d'administration.</p>
            @else
                <p>La réservation est désormais entièrement confirmée. Vous pouvez voir les détails complets dans le panel d'administration.</p>
            @endif
            <a href="{{ url('/admin/bookings') }}" style="display:inline-block; padding:10px 20px; background:#111; color:#fff; text-decoration:none; border-radius:5px;">Ouvrir le Panel</a>
        </div>
    </div>
</body>
</html>
