<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActividadesResource\Pages;
use App\Filament\Resources\ActividadesResource\RelationManagers;
use App\Models\Actividades;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ActividadesResource extends Resource
{
    protected static ?string $model = Actividades::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Content');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('imagen')->image()
                    ->required()
                    ->imageEditor()
                    ->directory('noticias')
                    ->alignCenter()->imageResizeMode('cover')
                    ->columnSpanFull(),
                TextInput::make('nombre')->required()->maxLength(255)->autocapitalize('words')->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))->unique(ignoreRecord: true),
                TextInput::make('slug'),

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
                ])->columns(3),
                TinyEditor::make('descripcion')->required()->columnSpanFull()->language('es_MX'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lugar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo'),
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
            'index' => Pages\ListActividades::route('/'),
            'create' => Pages\CreateActividades::route('/create'),
            'edit' => Pages\EditActividades::route('/{record}/edit'),
        ];
    }
}
