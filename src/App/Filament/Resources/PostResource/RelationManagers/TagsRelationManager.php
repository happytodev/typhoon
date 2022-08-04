<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;

class TagsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'tags';

    protected static ?string $recordTitleAttribute = 'name';

    protected static bool $shouldPreloadAttachFormRecordSelectOptions = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                CharcountedTextInput::make('name')
                    ->reactive()
                    ->required()
                    ->minLength(3)
                    ->maxLength(30)
                    ->minCharacters(3)
                    ->maxCharacters(30)
                    ->afterStateUpdated(function ($set, ?string $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug'),
                CharcountedTextInput::make('description')
                    ->minLength(3)
                    ->maxLength(255)
                    ->minCharacters(3)
                    ->maxCharacters(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description'),
                // Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }
}
