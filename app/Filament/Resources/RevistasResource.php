<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevistasResource\Pages;
use App\Filament\Resources\RevistasResource\RelationManagers;
use App\Models\Revistas;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RevistasResource extends Resource
{
    protected static ?string $model = Revistas::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255)->url(),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->autosize(),
                FileUpload::make('image')->directory('revistas')->required()->imageEditor()->imageCropAspectRatio('1:1'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
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
            'index' => Pages\ListRevistas::route('/'),
            'create' => Pages\CreateRevistas::route('/create'),
            'edit' => Pages\EditRevistas::route('/{record}/edit'),
        ];
    }
}
