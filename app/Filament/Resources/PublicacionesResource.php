<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicacionesResource\Pages;
use App\Filament\Resources\PublicacionesResource\RelationManagers;
use App\Models\Categoria;
use App\Models\Publicaciones;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PublicacionesResource extends Resource
{
    protected static ?string $model = Publicaciones::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nombre')->required()->maxLength(255)->live(onBlur: true)
                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
            TextInput::make('slug'),
            Forms\Components\TextInput::make('autor')->required()->maxLength(255),
            Forms\Components\TextInput::make('isbn', 'ISBN')->required()->maxLength(255),
            Forms\Components\TextInput::make('paginas')->required()->numeric(),
            Forms\Components\TextInput::make('coordinadores')->required()->maxLength(255),
            Forms\Components\TextInput::make('año_publicacion')->required()->numeric(),
            FileUpload::make('imagen')->required()->image()->directory('images')->moveFiles()->imageEditor(),
            FileUpload::make('archivo')
                ->required()
                ->acceptedFileTypes(['application/pdf'])
                ->openable()
                ->directory('files')
                ->preserveFilenames()
                ->moveFiles(),
            Textarea::make('descripcion')->required()->maxLength(400),
            Select::make('tipo')->options(['publicación' => 'Publicación', 'colección' => 'Colección'])->required(),
            Select::make('categoria_id')->options(fn(Get $get): Collection => Categoria::query()->where('tipo', $get('tipo'))->pluck('name','id'))->searchable()->preload(),
            Forms\Components\Toggle::make('novedad')->required(),
            Toggle::make('active')->onColor('success')->offColor('danger')->inline()->default(true),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('autor')->searchable(),
                Tables\Columns\TextColumn::make('isbn')->searchable(),
                Tables\Columns\TextColumn::make('coordinadores')->searchable(),
                Tables\Columns\TextColumn::make('año_publicacion')->numeric()->sortable(),
                TextColumn::make('tipo')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('novedad')->boolean(),
                ToggleColumn::make('active')->onColor('success')->offColor('danger'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)
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
            'index' => Pages\ListPublicaciones::route('/'),
            'create' => Pages\CreatePublicaciones::route('/create'),
            'edit' => Pages\EditPublicaciones::route('/{record}/edit'),
        ];
    }
}
