<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $modelLabel = 'Éducation';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Éducation')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nom de l\'expérience pro')
                            ->required(),
                        Forms\Components\TextInput::make('school')
                            ->label('École')
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
                    ->label('Nom de la formation'),

                Tables\Columns\TextColumn::make('school')
                    ->searchable()
                    ->label('École'),

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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
