<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicacionesResource\Pages;
use App\Models\Categoria;
use App\Models\Publicaciones;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
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
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PublicacionesResource extends Resource
{
    protected static ?string $model = Publicaciones::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nombre')->required()->maxLength(255)->autocapitalize('words')->live(onBlur: true)
                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))->unique(ignoreRecord: true),
            TextInput::make('slug'),

            Repeater::make('autor')->simple(
                TextInput::make('autor')
            ),

            TextInput::make('isbn')->label('ISBN')->required()->maxLength(255),
            TextInput::make('anio_publicacion')->required()->integer()->mask('9999')->placeholder('YYYY'),
            TextInput::make('paginas')->label('Páginas')->required()->numeric(),
            TinyEditor::make('descripcion')->required()->columnSpanFull(),

            //TagsInput::make('coordinadores')->reorderable()->separator(','),
            Repeater::make('coordinadores')->simple(
                TextInput::make('coordinadores')
            ),


            Select::make('tipo')->options(['publicación' => 'Publicación', 'colección' => 'Colección'])->required(),
            Select::make('categoria_id')->label('Categoria')->required()->options(fn(Get $get): Collection => Categoria::query()->where('tipo', $get('tipo'))->pluck('name', 'id'))->searchable()->preload(),

            Section::make()->schema([
                Section::make('Acciones')->schema([
                    Toggle::make('novedad')->onColor('success')->offColor('danger')->default(true)->required(),
                    Toggle::make('active')->onColor('success')->offColor('danger')->default(true)->required()->label('Activo'),
                ])->columnSpan(1)->columns(1),

                Section::make('Archivos')->schema([
                    FileUpload::make('imagen')
                        //->required()
                        ->image()
                        ->directory('images')->moveFiles()->imageEditor()
                        ->removeUploadedFileButtonPosition('right')
                        ->imagePreviewHeight('150')
                        ->uploadButtonPosition('left')->imageEditorAspectRatios([
                            '9:16',
                            '16:9',
                            '4:3',
                            '1:1',
                        ])->preserveFilenames(),
                    FileUpload::make('archivo')
                        //->required()
                        ->acceptedFileTypes(['application/pdf'])
                        ->openable()
                        ->directory('files')->preserveFilenames()
                        ->moveFiles()->removeUploadedFileButtonPosition('left')->maxSize(15000),
                ])->columnSpan(1)->columns(1),
            ])->columns(2),

        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->searchable()->words(100)->wrap()->sortable(),
                TextColumn::make('autor')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true)->badge()->separator(','),
                TextColumn::make('isbn')->searchable()->sortable()->label('ISBN'),
                TextColumn::make('coordinadores')->searchable()->wrap()->toggleable(isToggledHiddenByDefault: true)->badge()->separator(','),
                TextColumn::make('anio_publicacion')->sortable()->searchable()->label('Año de Publicación'),
                TextColumn::make('download')->sortable()->label('Descargas'),
                ToggleColumn::make('novedad')->onColor('success')->offColor('danger')->toggleable(isToggledHiddenByDefault: false),
                ToggleColumn::make('active')->onColor('success')->offColor('danger')->label('Activo')->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('tipo')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)->label('Creado'),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)->label('Actualizado'),
                TextColumn::make('slug')->sortable()->toggleable(isToggledHiddenByDefault: true)->label('Slug'),
            ])
            ->filters([
                Filter::make('novedad')
                    ->query(fn(Builder $query): Builder => $query->where('novedad', true))->toggle(),
                Filter::make('active')
                    ->query(fn(Builder $query): Builder => $query->where('active', true))->toggle()->label('Activo'),

            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
                ExportBulkAction::make()
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
            'index' => Pages\ListPublicaciones::route('/'),
            'create' => Pages\CreatePublicaciones::route('/create'),
            'edit' => Pages\EditPublicaciones::route('/{record}/edit'),
        ];
    }
}
