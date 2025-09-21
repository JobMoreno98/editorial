<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevistasResource\Pages;
use App\Filament\Resources\RevistasResource\RelationManagers;
use App\Models\Revistas;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class RevistasResource extends Resource
{
    protected static ?string $model = Revistas::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $title = 'Difusión';
    protected static ?string $navigationLabel = 'Difusión';

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label('Imagen')
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
