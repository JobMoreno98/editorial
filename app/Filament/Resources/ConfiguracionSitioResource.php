<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\ConfiguracionSitioResource\Pages\ListConfiguracionSitios;
use App\Filament\Resources\ConfiguracionSitioResource\Pages\CreateConfiguracionSitio;
use App\Filament\Resources\ConfiguracionSitioResource\Pages\EditConfiguracionSitio;
use App\Filament\Resources\ConfiguracionSitioResource\Pages;
use App\Models\ConfiguracionSitio;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ConfiguracionSitioResource extends Resource
{
    protected static ?string $model = ConfiguracionSitio::class;

    protected static ?string $pluralModelLabel  = 'Configuración del Sitio';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('Site');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del sitio')->schema([
                    FileUpload::make('image_banner')
                        ->acceptedFileTypes(['image/*'])
                        ->imageEditor()
                        ->imageCropAspectRatio('16:3')->columnSpanFull()->getUploadedFileNameForStorageUsing(
                            fn(TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                ->prepend('banner-'),
                        ),
                    TextInput::make('nombre')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('contacto')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('direccion')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')->required()->email(),
                    RichEditor::make('about')->required()->columnSpanFull(),
                ])->columns(2),
                Section::make()->schema([
                    Section::make('Colores del sitio')->schema([
                        ColorPicker::make('background_color')
                            ->rgb()->default("#e2e2e2"),
                        ColorPicker::make('accent_color')
                            ->rgb()->default("#e2e2e2"),
                        ColorPicker::make('heading_color')
                            ->rgb()->default("#e2e2e2"),
                        ColorPicker::make('nav_color')
                            ->rgb()->default("#e2e2e2"),
                        ColorPicker::make('nav_hover_color')
                            ->rgb()->default("#e2e2e2"),
                        ColorPicker::make('nav_dropdown_color')
                            ->rgb()->default("#e2e2e2"),
                        ColorPicker::make('nav_dropdown_hover_color')
                            ->rgb()->default("#e2e2e2"),
                    ])->columns(3),
                    Section::make('Lineamientos Editoriales')->schema([
                        FileUpload::make('archivo')
                            ->acceptedFileTypes(['application/pdf'])
                            ->openable()
                            ->directory('files')
                            ->preserveFilenames()
                            ->moveFiles()->removeUploadedFileButtonPosition('right'),
                    ])->columnSpan(1),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('contacto')
                    ->searchable(),
                TextColumn::make('direccion')
                    ->searchable(),
                ImageColumn::make('image_banner'),
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
            'index' => ListConfiguracionSitios::route('/'),
            'create' => CreateConfiguracionSitio::route('/create'),
            'edit' => EditConfiguracionSitio::route('/{record}/edit'),
        ];
    }
}
