<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Page;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Forms\Components\TextInput::make('name')
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function ($set, ?string $state) {
                        $set('slug', Str::slug($state));
                    }),
                    Forms\Components\TextInput::make('description'),
                    TextInput::make('slug')
                    ->unique(ignorable: fn ($record) => $record),
                ])->columns(2),
                Card::make([
                    Builder::make('content')
                    ->blocks([
                        Builder\Block::make('heading')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Heading')
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                                Select::make('width')
                                    ->options([
                                        '12' => 'Full',
                                        '9' => '3/4',
                                        '6' => 'Half',
                                        '3' => '1/4'
                                    ])
                                    ->default('12')
                            ]),
                        Builder\Block::make('featured-post')
                            ->schema([
                                TextInput::make('featuredPostTitle')
                                    ->label('Featured Post title')
                                    ->required(),
                            ]),
                        Builder\Block::make('paragraph')
                            ->schema([
                                MarkdownEditor::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                            ]),
                        Builder\Block::make('image')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                            ]),
                    ])
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
