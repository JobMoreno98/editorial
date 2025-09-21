<?php

namespace App\Filament\Editor\Resources;

use App\Filament\Editor\Resources\ActividadesResource\Pages;
use App\Filament\Editor\Resources\ActividadesResource\RelationManagers;
use App\Models\Actividades;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActividadesResource extends Resource
{
    protected static ?string $model = Actividades::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('lugar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('imagen')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tipo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lugar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imagen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo'),
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
            'index' => Pages\ListActividades::route('/'),
            'create' => Pages\CreateActividades::route('/create'),
            'edit' => Pages\EditActividades::route('/{record}/edit'),
        ];
    }
}
