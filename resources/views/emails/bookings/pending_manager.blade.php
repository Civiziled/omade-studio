<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #111; color: #cd7f32; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 8px 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nouvelle demande de réservation</h2>
        </div>
        <div class="content">
            <p><strong>Client :</strong> {{ $booking->client_name }} ({{ $booking->client_email }})</p>
            <p><strong>Date :</strong> {{ $booking->booking_date->format('d/m/Y') }}</p>
            <p><strong>Heure :</strong> {{ $booking->start_time->format('H:i') }} à {{ $booking->end_time->format('H:i') }}</p>
            <p><strong>Détails :</strong><br>{!! nl2br(e($booking->notes)) !!}</p>
            
            <hr>
            <p>Rendez-vous dans le panel d'administration pour accepter cette demande et fixer le prix final de la session.</p>
            <a href="{{ url('/admin/bookings') }}" style="display:inline-block; padding:10px 20px; background:#cd7f32; color:#fff; text-decoration:none; border-radius:5px;">Ouvrir le Panel Admin</a>
        </div>
    </div>
</body>
</html>
