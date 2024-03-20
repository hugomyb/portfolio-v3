<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Projets';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Projet')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->columnSpanFull()
                            ->label('Nom')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Set $set) {
                                $set('slug', Str::slug($state));
                            })
                            ->required(),

                        Forms\Components\TextInput::make('slug')
                            ->prefix(config('app.url') . '/projets/')
                            ->disabled()
                            ->dehydrated()
                            ->columnSpanFull()
                            ->label('Slug')
                            ->required(),

                        Forms\Components\Textarea::make('resume')
                            ->columnSpanFull()
                            ->label('Résumé')
                            ->required(),

                        Forms\Components\FileUpload::make('thumbnail')
                            ->columnSpanFull()
                            ->label('Image principale')
                            ->imageEditor()
                            ->image()
                            ->required(),
                    ]),

                Forms\Components\Fieldset::make('Détails')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Catégorie')
                            ->preload()
                            ->searchable()
                            ->options(\App\Models\Category::pluck('name', 'id')->toArray())
                            ->required(),

                        Forms\Components\Select::make('tags')
                            ->label('Tags')
                            ->relationship('tags', 'name')
                            ->preload()
                            ->searchable()
                            ->required()
                            ->createOptionForm(TagResource::getForm())
                            ->multiple(),

                        Forms\Components\DatePicker::make('date')
                            ->label('Date')
                            ->native(false)
                            ->format('Y-m-d')
                            ->displayFormat('d F Y')
                            ->required(),

                        Forms\Components\TextInput::make('url')
                            ->url()
                            ->prefixIcon('heroicon-o-link')
                            ->label('Lien'),
                    ]),

                Forms\Components\Fieldset::make('Optionnel')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->disableToolbarButtons(['attachFiles'])
                            ->columnSpanFull()
                            ->label('Description'),

                        Forms\Components\FileUpload::make('images')
                            ->columnSpanFull()
                            ->label('Images')
                            ->imageEditor()
                            ->reorderable()
                            ->image()
                            ->multiple(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nom'),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Thumbnail'),

                Tables\Columns\TextColumn::make('slug')
                    ->url(fn (Project $record) => route('project', $record))
                    ->color('primary')
                    ->label('Slug'),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->badge(),

                Tables\Columns\TextColumn::make('date')
                    ->sortable()
                    ->date('d F Y'),

                Tables\Columns\TextColumn::make('tags.name')
                    ->badge()
                    ->label('Tags'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->options(\App\Models\Category::pluck('name', 'id')->toArray())
                    ->label('Catégorie'),

                Tables\Filters\SelectFilter::make('tags')
                    ->multiple()
                    ->relationship('tags', 'name')
                    ->options(\App\Models\Tag::pluck('name', 'id')->toArray())
                    ->label('Tags'),
            ])
            ->defaultSort('date', 'desc')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
