<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Filament\Resources\ExperienceResource\RelationManagers;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $modelLabel = 'Experience';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Experience')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Nom de l\'expérience pro')
                        ->required(),
                    Forms\Components\TextInput::make('location')
                        ->label('Lieu')
                        ->required(),
                    Forms\Components\TextInput::make('start_date')
                        ->label('Date de début')
                        ->required(),
                    Forms\Components\TextInput::make('end_date')
                        ->label('Date de fin')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('Nom de l\'expérience pro'),

                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->label('Lieu'),

                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->label('Date de début'),

                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->label('Date de fin'),
            ])
            ->reorderable('order')
            ->defaultSort('order')
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
