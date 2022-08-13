<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PostResource\Pages;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('status'),
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
                    MarkdownEditor::make('tldr')
                        ->columnSpan(2)
                        ->nullable(),
                    MarkdownEditor::make('content')
                        ->columnSpan(2)
                        ->nullable(),
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required(),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                    Toggle::make('featured')
                        ->label('Featured')
                        ->default(false)
                        ->columnSpan('full'),
                    Select::make('status')
                        ->options([
                            'draft' => 'Draft',
                            'review' => 'In review',
                            'published' => 'Published',
                            'scheduledtopublish' => 'Scheduled to publish',
                            'scheduledtounpublish' => 'Scheduled to unpublish',
                            'unpublished' => 'Unpublished',
                        ])
                        ->reactive(),

                    Group::make()
                    ->schema(function ($get) {
                        $status = $get('status');
                        return match ($status) {
                            'scheduledtopublish' => [
                                DateTimePicker::make('published_at')
                                ->withoutSeconds()
                                ->nullable(),
                            ],
                            'scheduledtounpublish' => [
                                DateTimePicker::make('unpublished_at')
                                ->withoutSeconds()
                                ->nullable(),
                            ],
                            default => [],
                        };
                    })
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
