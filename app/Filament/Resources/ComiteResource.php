<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\ComiteResource\Pages\ListComites;
use App\Filament\Resources\ComiteResource\Pages\CreateComite;
use App\Filament\Resources\ComiteResource\Pages\EditComite;
use App\Filament\Resources\ComiteResource\Pages;
use App\Filament\Resources\ComiteResource\RelationManagers;
use App\Models\Comite;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
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

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Consejo Editorial';

    protected static ?string $pluralModelLabel = 'Consejo Editorial';

    public static function getNavigationGroup(): ?string
    {
        return __('Directory');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->acceptedFileTypes(['image/*'])
                    ->avatar()
                    ->required()->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->alignCenter()
                    ->columnSpanFull()
                    ->directory('comite'),
                Section::make()->schema([
                    TextInput::make('nombre')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('reseña')
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
            'index' => ListComites::route('/'),
            'create' => CreateComite::route('/create'),
            'edit' => EditComite::route('/{record}/edit'),
        ];
    }
}
