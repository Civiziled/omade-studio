<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #111; color: #fff; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 8px 8px; }
        .accent { color: #cd7f32; }
        .btn { display: inline-block; padding: 12px 24px; background: #cd7f32; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>O'Made <span class="accent">Studio</span></h2>
        </div>
        <div class="content">
            <h3>Félicitations {{ $booking->client_name }} ! 🎉</h3>
            <p>Votre session au studio a été acceptée et validée par notre gérant.</p>
            
            <div style="background:#eee; padding:15px; border-radius:5px; margin:20px 0;">
                <p style="margin:0;"><strong>Date :</strong> {{ $booking->booking_date->format('d/m/Y') }}</p>
                <p style="margin:0;"><strong>Horaires :</strong> {{ $booking->start_time->format('H:i') }} - {{ $booking->end_time->format('H:i') }}</p>
                <p style="margin:0;"><strong>Montant total :</strong> {{ $booking->price }} €</p>
                @if($booking->payment_method === 'cash')
                    <p style="margin:0; color:#cd7f32; font-weight:bold;">Acompte à régler aujourd'hui : {{ $booking->price / 2 }} €</p>
                    <p style="margin:0; font-size:0.9em;">(Le reste sera à régler en espèces sur place)</p>
                @endif
            </div>
            
            <p>Il ne vous reste plus qu'à régler votre session pour bloquer définitivement votre créneau horaire. Le paiement est 100% sécurisé via Stripe.</p>
            
            <div style="text-align: center;">
                @if($booking->payment_method === 'cash')
                    <a href="{{ $checkoutUrl }}" class="btn">Payer ma caution ({{ $booking->price / 2 }} €)</a>
                @else
                    <a href="{{ $checkoutUrl }}" class="btn">Payer ma session ({{ $booking->price }} €)</a>
                @endif
            </div>
            
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 0.95em;">
                <h4 style="margin-bottom: 5px; color: #333;">Informations pratiques :</h4>
                <p style="margin: 0; color: #555;"><strong>O'Made Studio</strong><br/>
                📍 [Adresse de ton studio, ex: 12 Rue de la Musique, 1000 Bruxelles]<br/>
                📞 Téléphone : [Ton numéro de téléphone]<br/>
                ✉️ Email : contact@omade-studio.be</p>
            </div>
            
            <p style="margin-top: 30px; font-size: 0.9em; color: #666;">Si vous avez une question, n'hésitez pas à répondre directement à cet email.</p>
        </div>
    </div>
</body>
</html>
