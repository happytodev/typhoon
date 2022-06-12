<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\PostResource\Pages;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\PostResource\RelationManagers;

use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\FileUpload;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('title')
    //                 ->required(),
    //             Forms\Components\TextInput::make('tldr'),
    //             Forms\Components\TextInput::make('slug'),
    //             Forms\Components\Textarea::make('content'),
    //             BelongsToSelect::make('user_id')
    //                 ->resource(UserResource::class)
    //                 ->required(),
    //             Forms\Components\TextInput::make('user_id')
    //                 ->required(),
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('tldr'),
                //Tables\Columns\TextColumn::make('slug'),
                //Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

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
                        ->relationship('user', 'name')
                        ->required(),
                    BelongsToSelect::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                    // DatePicker::make('published_at')
                    //     ->nullable()
                    //     ->helperText('If in the past, the post will go live immediately.'),
                ])
                    ->columns(2),
                Card::make([
                    FileUpload::make('main_image')
                    ->nullable(),
                ])
                ->columns(1),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\TagsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
