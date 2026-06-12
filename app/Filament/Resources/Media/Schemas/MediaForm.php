<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                \Filament\Forms\Components\Select::make('type')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Vidéo',
                        '3d_model' => 'Modèle 3D',
                        'lottie' => 'Animation Lottie',
                    ])
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('file_path')
                    ->directory('gallery')
                    ->acceptedFileTypes(['image/*', 'video/mp4', 'video/quicktime', 'application/json'])
                    ->maxSize(51200) // 50MB max
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('thumbnail_path')
                    ->directory('thumbnails')
                    ->image(),
                \Filament\Forms\Components\Select::make('category')
                    ->options([
                        'gallery' => 'Galerie',
                        'hero' => 'Accueil (Hero)',
                        'about' => 'Histoire',
                    ])
                    ->required()
                    ->default('gallery'),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
