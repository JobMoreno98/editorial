<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DirectorioResource\Pages;
use App\Filament\Resources\DirectorioResource\RelationManagers;
use App\Models\Directorio;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DirectorioResource extends Resource
{
    protected static ?string $model = Directorio::class;
    protected static ?string $pluralModelLabel  = 'Directorio';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Directory');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('puesto')
                    ->required(),
                Forms\Components\TextInput::make('correo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()->imageEditor()
                    ->imageCropAspectRatio('1:1')->directory('directorio'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('puesto'),
                Tables\Columns\TextColumn::make('correo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable()->hidden(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable()->hidden(),
                Tables\Columns\ImageColumn::make('image')->hidden(),
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
            'index' => Pages\ListDirectorios::route('/'),
            'create' => Pages\CreateDirectorio::route('/create'),
            'edit' => Pages\EditDirectorio::route('/{record}/edit'),
        ];
    }
}
