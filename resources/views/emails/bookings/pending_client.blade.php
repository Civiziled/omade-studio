<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #111; color: #fff; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 8px 8px; }
        .accent { color: #cd7f32; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>O'Made <span class="accent">Studio</span></h2>
        </div>
        <div class="content">
            <h3>Bonjour {{ $booking->client_name }},</h3>
            <p>Nous avons bien reçu votre demande de réservation pour le <strong>{{ $booking->booking_date->format('d/m/Y') }}</strong> de <strong>{{ $booking->start_time->format('H:i') }}</strong> à <strong>{{ $booking->end_time->format('H:i') }}</strong>.</p>
            
            <p>Votre demande est actuellement <strong>en attente d'une réponse de notre gérant</strong>. Nous allons étudier vos besoins et valider la disponibilité exacte.</p>
            
            <p>Dès que votre session sera validée, vous recevrez un second email contenant le prix final et un lien sécurisé pour procéder au paiement et bloquer définitivement le studio.</p>
            
            <p>À très bientôt,<br>L'équipe O'Made Studio.</p>
        </div>
    </div>
</body>
</html>
