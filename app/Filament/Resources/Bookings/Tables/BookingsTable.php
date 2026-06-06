<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Models\Booking;
use Filament\Forms\Components\TextInput;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('client_name')
                    ->searchable(),
                TextColumn::make('client_email')
                    ->searchable(),
                TextColumn::make('booking_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('start_time')
                    ->time()
                    ->sortable(),
                TextColumn::make('end_time')
                    ->time()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        'completed' => 'gray',
                    }),
                TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'unpaid' => 'warning',
                        'paid' => 'success',
                        'refunded' => 'danger',
                    }),
                TextColumn::make('price')
                    ->money('EUR')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('approve_payment')
                    ->label('Accepter & Demander Paiement')
                    ->icon('heroicon-o-currency-euro')
                    ->color('success')
                    ->requiresConfirmation()
                    ->form([
                        TextInput::make('price')
                            ->label('Prix final (€)')
                            ->numeric()
                            ->required()
                            ->default(function (Booking $record) {
                                if (preg_match('/Service sélectionné : (.*?)(?:\n|$)/', $record->notes, $matches)) {
                                    $service = trim($matches[1]);
                                    
                                    if (str_contains($service, '35€/h')) {
                                        $start = \Carbon\Carbon::parse($record->start_time);
                                        $end = \Carbon\Carbon::parse($record->end_time);
                                        $hours = $start->diffInMinutes($end) / 60;
                                        return 35 * $hours;
                                    } elseif (str_contains($service, '50€')) {
                                        return 50;
                                    } elseif (str_contains($service, '100€')) {
                                        return 100;
                                    } elseif (str_contains($service, '190€')) {
                                        return 190;
                                    } elseif (str_contains($service, '300€')) {
                                        return 300;
                                    }
                                }
                                return null;
                            }),
                    ])
                    ->action(function (Booking $record, array $data) {
                        $record->update([
                            'price' => $data['price'],
                            'status' => 'confirmed',
                            'payment_status' => 'unpaid',
                        ]);

                        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
                        $checkout_session = $stripe->checkout->sessions->create([
                            'line_items' => [[
                                'price_data' => [
                                    'currency' => 'eur',
                                    'product_data' => [
                                        'name' => 'Session O\'Made Studio - ' . $record->booking_date->format('d/m/Y'),
                                    ],
                                    'unit_amount' => $data['price'] * 100,
                                ],
                                'quantity' => 1,
                            ]],
                            'mode' => 'payment',
                            'success_url' => route('bookings.success', ['booking' => $record->id]) . '?session_id={CHECKOUT_SESSION_ID}',
                            'cancel_url' => url('/'),
                        ]);

                        $record->update(['stripe_session_id' => $checkout_session->id]);

                        \Illuminate\Support\Facades\Mail::to($record->client_email)
                            ->send(new \App\Mail\BookingApprovedClientMail($record, $checkout_session->url));
                    })
                    ->visible(fn (Booking $record) => $record->status === 'pending'),

                Action::make('refund')
                    ->label('Rembourser')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Booking $record) {
                        if ($record->stripe_payment_intent) {
                            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
                            $stripe->refunds->create(['payment_intent' => $record->stripe_payment_intent]);
                            $record->update(['payment_status' => 'refunded', 'status' => 'cancelled']);
                        }
                    })
                    ->visible(fn (Booking $record) => $record->payment_status === 'paid'),
                    
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
