<?php

namespace App\Filament\Resources\TagResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;

class PostsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('title')
                        ->reactive()
                        ->required()
                        ->afterStateUpdated(function ($set, ?string $state) {
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->unique(ignorable: fn ($record) => $record),
                    MarkdownEditor::make('content')
                        ->columnSpan(2)
                        ->nullable(),
                    BelongsToSelect::make('user_id')
                        ->relationship('user', 'name'),
                    BelongsToSelect::make('category_id')
                        ->relationship('category', 'name'),
                    Forms\Components\Toggle::make('featured')
                        ->required(),
                    // TagsInput::make('tags')->separator(',')
                    // DatePicker::make('published_at')
                    //     ->nullable()
                    //     ->helperText('If in the past, the post will go live immediately.'),
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                // Tables\Columns\TextColumn::make('tldr'),
                //Tables\Columns\TextColumn::make('slug'),
                //Tables\Columns\TextColumn::make('content'),
                // Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\BooleanColumn::make('featured'),
            ])
            ->filters([
                //
            ]);
    }
}
