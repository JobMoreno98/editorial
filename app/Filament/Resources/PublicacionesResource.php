<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicacionesResource\Pages;
use App\Models\Categoria;
use App\Models\Publicaciones;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
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
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PublicacionesResource extends Resource
{
    protected static ?string $model = Publicaciones::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nombre')->required()->maxLength(255)->live(onBlur: true)
                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
            TextInput::make('slug'),
            TextInput::make('autor')->required()->maxLength(255),
            Forms\Components\TextInput::make('isbn')->label('ISBN')->required()->maxLength(255),
            Forms\Components\TextInput::make('paginas')->label('Páginas')->required()->numeric(),
            Forms\Components\TextInput::make('coordinadores')->required()->maxLength(255),
            TextInput::make('año_publicacion')->required()->integer()->mask('9999')->placeholder('YYYY'),
            Textarea::make('descripcion')->required()->maxLength(400),
            Select::make('tipo')->options(['publicación' => 'Publicación', 'colección' => 'Colección'])->required(),
            Select::make('categoria_id')->label('Categoria')->required()->options(fn(Get $get): Collection => Categoria::query()->where('tipo', $get('tipo'))->pluck('name', 'id'))->searchable()->preload(),

            Section::make('Archvios')->schema([
                FileUpload::make('imagen')->required()->image()->directory('images')->moveFiles()->imageEditor()
                    ->removeUploadedFileButtonPosition('right')
                    ->imagePreviewHeight('150')
                    ->uploadButtonPosition('left')->imageEditorAspectRatios([
                        '9:16',
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
                FileUpload::make('archivo')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable()
                    ->directory('files')
                    ->preserveFilenames()
                    ->moveFiles()->removeUploadedFileButtonPosition('right'),
            ])->columns(1)->columnSpan(1),

            Section::make()->schema([
                Toggle::make('novedad')->required(),
                Toggle::make('active')->onColor('success')->offColor('danger')->inline()->default(true)->required(),
            ])->columnSpan(1),

        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('autor')->searchable(),
                Tables\Columns\TextColumn::make('isbn')->searchable(),
                Tables\Columns\TextColumn::make('coordinadores')->searchable(),
                Tables\Columns\TextColumn::make('año_publicacion')->sortable()->searchable(),
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
