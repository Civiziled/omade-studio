<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                TextInput::make('client_name')
                    ->required(),
                TextInput::make('client_email')
                    ->email()
                    ->required(),
                TextInput::make('instagram_handle')
                    ->prefix('@'),
                DatePicker::make('booking_date')
                    ->required(),
                TimePicker::make('start_time')
                    ->required(),
                TimePicker::make('end_time')
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmé',
                        'completed' => 'Terminé',
                        'cancelled' => 'Annulé',
                    ])
                    ->required()
                    ->default('pending'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('music_file_path')
                    ->label('Maquette / Instrumentale (Client)')
                    ->directory('bookings/music')
                    ->acceptedFileTypes(['audio/*'])
                    ->downloadable()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Placeholder::make('audio_preview')
                    ->label('Aperçu de la Maquette')
                    ->content(fn ($record) => $record && $record->music_file_path ? new \Illuminate\Support\HtmlString('<audio controls src="'.\Illuminate\Support\Facades\Storage::url($record->music_file_path).'" class="w-full mt-2"></audio>') : 'Aucune maquette fournie.')
                    ->visible(fn ($record) => $record !== null)
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('stems_file_paths')
                    ->label('Pistes séparées / Stems')
                    ->directory('bookings/stems')
                    ->multiple()
                    ->downloadable()
                    ->columnSpanFull(),
            ]);
    }
}
