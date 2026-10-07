<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\CategoriaResource\Pages\ListCategorias;
use App\Filament\Resources\CategoriaResource\Pages\CreateCategoria;
use App\Filament\Resources\CategoriaResource\Pages\EditCategoria;
use App\Filament\Resources\CategoriaResource\Pages;
use App\Filament\Resources\CategoriaResource\RelationManagers;
use App\Filament\Resources\CategoriaResource\Widgets\CategoriasOverview;
use App\Models\Categoria;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriaResource extends Resource
{
    protected static ?string $model = Categoria::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-tag';
    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Select::make('tipo')->options(['publicación' => 'Publicación', 'colección' => 'Colección'])->required(),
                Textarea::make('descripcion')->label('Descripción')
                    ->maxLength(255)->columnSpanFull()->autosize(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')
                    ->searchable(),
                TextColumn::make('descripcion')->wrap()->label('Descripción')
                    ->searchable(),
                TextColumn::make('tipo')->sortable()->searchable(),
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
            'index' => ListCategorias::route('/'),
            'create' => CreateCategoria::route('/create'),
            'edit' => EditCategoria::route('/{record}/edit'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
            CategoriasOverview::class,
        ];
    }
}
