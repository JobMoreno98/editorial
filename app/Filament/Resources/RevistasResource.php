<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\RevistasResource\Pages\ListRevistas;
use App\Filament\Resources\RevistasResource\Pages\CreateRevistas;
use App\Filament\Resources\RevistasResource\Pages\EditRevistas;
use App\Filament\Resources\RevistasResource\Pages;
use App\Filament\Resources\RevistasResource\RelationManagers;
use App\Models\Revistas;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class RevistasResource extends Resource
{
    protected static ?string $model = Revistas::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $title = 'Difusión';
    protected static ?string $navigationLabel = 'Difusión';

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')->label('Imagen')->acceptedFileTypes(['image/*'])
                    ->directory('revistas')->required()
                    ->imageEditor()->columnSpanFull()->alignCenter()
                    ->imageCropAspectRatio('9:16')->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend('revistas-'),
                    ),
                TextInput::make('nombre')->required()
                    ->maxLength(255)
                    ->autocapitalize('words'),
                Select::make('tipo')->options([
                    'Revista' => 'Revista',
                    'Catedra' => 'Catedra'
                ])->required(),
                TextInput::make('url')
                    ->required()
                    ->maxLength(255)->url()->label('URL'),
                Textarea::make('descripcion')
                    ->required()
                    ->autosize(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('url')
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
            'index' => ListRevistas::route('/'),
            'create' => CreateRevistas::route('/create'),
            'edit' => EditRevistas::route('/{record}/edit'),
        ];
    }
}
