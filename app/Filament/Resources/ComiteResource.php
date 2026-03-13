<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComiteResource\Pages;
use App\Filament\Resources\ComiteResource\RelationManagers;
use App\Models\Comite;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComiteResource extends Resource
{
    protected static ?string $model = Comite::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Consejo Editorial';

    protected static ?string $pluralModelLabel = 'Consejo Editorial';

    public static function getNavigationGroup(): ?string
    {
        return __('Directory');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->acceptedFileTypes(['image/*'])
                    ->avatar()
                    ->required()->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->alignCenter()
                    ->columnSpanFull()
                    ->directory('comite'),
                Section::make()->schema([
                    Forms\Components\TextInput::make('nombre')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('reseña')
                        ->required()
                        ->maxLength(500)->autosize(),
                    Toggle::make('active')
                        ->onColor('success')
                        ->offColor('danger')->inline(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('reseña')->words(100)->wrap()->sortable(),
                ToggleColumn::make('active')
                    ->onColor('success')
                    ->offColor('danger'),
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
            'index' => Pages\ListComites::route('/'),
            'create' => Pages\CreateComite::route('/create'),
            'edit' => Pages\EditComite::route('/{record}/edit'),
        ];
    }
}
