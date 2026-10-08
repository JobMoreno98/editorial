<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\PreguntasResource\Pages\ListPreguntas;
use App\Filament\Resources\PreguntasResource\Pages\CreatePreguntas;
use App\Filament\Resources\PreguntasResource\Pages\EditPreguntas;
use App\Filament\Resources\PreguntasResource\Pages;
use App\Filament\Resources\PreguntasResource\RelationManagers;
use App\Models\Preguntas;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
class PreguntasResource extends Resource
{
    protected static ?string $model = Preguntas::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('pregunta')->required()->maxLength(255),
            RichEditor::make('respuesta')->required()
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pregunta')->searchable()->wrap(),
                TextColumn::make('respuesta')->searchable()->wrap()->words(50)->markdown(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
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
