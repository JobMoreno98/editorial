<?php

namespace App\Filament\Editor\Resources;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Editor\Resources\ActividadesResource\Pages\ListActividades;
use App\Filament\Editor\Resources\ActividadesResource\Pages\CreateActividades;
use App\Filament\Editor\Resources\ActividadesResource\Pages\EditActividades;
use App\Filament\Editor\Resources\ActividadesResource\Pages;
use App\Filament\Editor\Resources\ActividadesResource\RelationManagers;
use App\Models\Actividades;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActividadesResource extends Resource
{
    protected static ?string $model = Actividades::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('fecha')
                    ->required(),
                TextInput::make('lugar')
                    ->required()
                    ->maxLength(255),
                TextInput::make('imagen')
                    ->required()
                    ->maxLength(255),
                TextInput::make('tipo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                TextColumn::make('lugar')
                    ->searchable(),
                TextColumn::make('imagen')
                    ->searchable(),
                TextColumn::make('tipo'),
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
            'index' => ListActividades::route('/'),
            'create' => CreateActividades::route('/create'),
            'edit' => EditActividades::route('/{record}/edit'),
        ];
    }
}
