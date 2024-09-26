<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfiguracionSitioResource\Pages;
use App\Filament\Resources\ConfiguracionSitioResource\RelationManagers;
use App\Models\ConfiguracionSitio;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConfiguracionSitioResource extends Resource
{
    protected static ?string $model = ConfiguracionSitio::class;
    protected static ?string $pluralModelLabel  = 'Configuración del Sitio';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
{
    return __('Site');
}

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contacto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image_banner')
                    ->image()
                    ->required()->imageEditor()
                    ->imageCropAspectRatio('16:3'),
                Section::make('Colores')->schema([
                    ColorPicker::make('background_color')
                        ->rgb()->default("#e2e2e2"),
                    ColorPicker::make('accent_color')
                        ->rgb()->default("#e2e2e2"),
                    ColorPicker::make('heading_color')
                        ->rgb()->default("#e2e2e2"),
                    ColorPicker::make('nav_color')
                        ->rgb()->default("#e2e2e2"),
                    ColorPicker::make('nav_hover_color')
                        ->rgb()->default("#e2e2e2"),
                    ColorPicker::make('nav_dropdown_color')
                        ->rgb()->default("#e2e2e2"),
                    ColorPicker::make('nav_dropdown_hover_color')
                        ->rgb()->default("#e2e2e2"),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contacto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_banner'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfiguracionSitios::route('/'),
            'create' => Pages\CreateConfiguracionSitio::route('/create'),
            'edit' => Pages\EditConfiguracionSitio::route('/{record}/edit'),
        ];
    }
}
