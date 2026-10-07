<?php

namespace App\Filament\Editor\Resources;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Editor\Resources\PreguntasResource\Pages\ListPreguntas;
use App\Filament\Editor\Resources\PreguntasResource\Pages\CreatePreguntas;
use App\Filament\Editor\Resources\PreguntasResource\Pages\EditPreguntas;
use App\Filament\Editor\Resources\PreguntasResource\Pages;
use App\Filament\Editor\Resources\PreguntasResource\RelationManagers;
use App\Models\Preguntas;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PreguntasResource extends Resource
{
    protected static ?string $model = Preguntas::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pregunta')
                    ->required()
                    ->maxLength(255),
                TextInput::make('respuesta')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pregunta')
                    ->searchable(),
                TextColumn::make('respuesta')
                    ->searchable(),
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
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListPreguntas::route('/'),
            'create' => CreatePreguntas::route('/create'),
            'edit' => EditPreguntas::route('/{record}/edit'),
        ];
    }
}
