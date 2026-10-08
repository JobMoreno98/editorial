<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\ActividadesResource\Pages\ListActividades;
use App\Filament\Resources\ActividadesResource\Pages\CreateActividades;
use App\Filament\Resources\ActividadesResource\Pages\EditActividades;
use App\Models\Actividades;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Str;
class ActividadesResource extends Resource
{
    protected static ?string $model = Actividades::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('imagen')->acceptedFileTypes(['image/*'])
                    ->required()
                    ->imageEditor()
                    ->directory('noticias')
                    ->alignCenter()->imageResizeMode('cover')
                    ->columnSpanFull(),

                TextInput::make('nombre')->required()->maxLength(255)->autocapitalize('words')->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))->unique(ignoreRecord: true),
                TextInput::make('slug')->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Section::make()->schema([
                    DatePicker::make('fecha')
                        ->required(),
                    TextInput::make('lugar')
                        ->required()
                        ->maxLength(255),

                    Select::make('tipo')->options([
                        'Evento' => 'Evento',
                        'Noticia' => 'Noticia'
                    ])->required(),
                    ToggleButtons::make('active')
                        ->label('Activo')
                        ->boolean()
                        ->inline()
                ])->columns(4),
                RichEditor::make('descripcion')->required()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                TextColumn::make('lugar')
                    ->searchable(),
                TextColumn::make('tipo'),
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
            'index' => ListActividades::route('/'),
            'create' => CreateActividades::route('/create'),
            'edit' => EditActividades::route('/{record}/edit'),
        ];
    }
}
