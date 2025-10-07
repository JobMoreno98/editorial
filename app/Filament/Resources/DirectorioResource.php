<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DirectorioResource\Pages;
use App\Filament\Resources\DirectorioResource\RelationManagers;
use App\Models\Directorio;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DirectorioResource extends Resource
{
    protected static ?string $model = Directorio::class;
    protected static ?string $pluralModelLabel = 'Directorio';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return __('Directory');
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('image')->label('Imagen')
                ->acceptedFileTypes(['image/*'])
                ->required()
                ->imageEditor()
                ->imageCropAspectRatio('1:1')
                ->directory('directorio')
                ->columnSpanFull()
                ->avatar()
                ->alignCenter(),
            TextInput::make('nombre')->required()->maxLength(255),
            TextInput::make('puesto')->required(),
            TextInput::make('correo')->required()->maxLength(255),
            TextInput::make('telefono')->maxLength(40)->required(),
            TextInput::make('direccion')->maxLength(255)->required(),
            Toggle::make('active')
                ->onColor('success')
                ->offColor('danger')->inline()->default(true)->label('Activo'),

            Select::make('id_padre')
                ->label('Padre')
                ->relationship('padre', 'nombre') // Asumiendo que tienes una relación en el modelo
                ->searchable()
                ->preload()
                ->nullable()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->searchable()->sortable(),
                TextColumn::make('puesto'),
                TextColumn::make('correo')->searchable(),
                TextColumn::make('telefono')->searchable(),
                TextColumn::make('direccion')->searchable()->hidden(),
                ToggleColumn::make('active')
                    ->onColor('success')
                    ->offColor('danger'),
                //ImageColumn::make('image')->hidden(), 
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
