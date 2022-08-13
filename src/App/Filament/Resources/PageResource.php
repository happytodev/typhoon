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
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static $backgroundColors = [
        'bg-white' => 'White',
        'bg-amber-100' => 'Amber 100',
        'bg-amber-300' => 'Amber 300',
        'bg-amber-600' => 'Amber 600',
        'bg-blue-100' => 'Blue 100',
        'bg-blue-300' => 'Blue 300',
        'bg-blue-600' => 'Blue 600',
        'bg-green-100' => 'Green 100',
        'bg-green-300' => 'Green 300',
        'bg-green-600' => 'Green 600',
        'bg-indigo-100' => 'Indigo 100',
        'bg-indigo-300' => 'Indigo 300',
        'bg-indigo-600' => 'Indigo 600',
        'bg-lime-100' => 'Lime 100',
        'bg-lime-300' => 'Lime 300',
        'bg-lime-600' => 'Lime 600',
        'bg-orange-100' => 'Orange 100',
        'bg-orange-300' => 'Orange 300',
        'bg-orange-600' => 'Orange 600',
        'bg-yellow-100' => 'Yellow 100',
        'bg-yellow-300' => 'Yellow 300',
        'bg-yellow-600' => 'Yellow 600',
    ];

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
                                    ->default('12'),
                                Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                Toggle::make('visible')
                                    ->label('Visible')
                                    ->default(true)
                            ]),
                        Builder\Block::make('featured-post')
                            ->schema([
                                TextInput::make('featuredPostsTitle')
                                    ->label('Featured Post title')
                                    ->required(),
                                MarkdownEditor::make('featuredPostsDescription')
                                    ->label('Description of featured block')
                                    ->required(),
                                TextInput::make('featuredPostsNumber')
                                    ->label('Featured Post limit to display'),
                                Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                Toggle::make('visible')
                                    ->label('Visible')
                                    ->default(true)
                            ]),
                        Builder\Block::make('latest-post')
                            ->schema([
                                TextInput::make('latestPostsTitle')
                                    ->label('Latest Post title')
                                    ->required(),
                                MarkdownEditor::make('latestPostsDescription')
                                    ->label('Description of latest block')
                                    ->required(),
                                TextInput::make('latestPostsNumber')
                                    ->label('Latest Post limit to display'),
                                Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true)
                            ]),
                        Builder\Block::make('paragraph')
                            ->schema([
                                MarkdownEditor::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                                Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true)
                            ]),
                        Builder\Block::make('plugins')
                            ->schema(function () {
                                // get the list of installed plugins
                                $listPlugins = config('typhoon.plugins');
                                return [
                                    // display the list of available plugins
                                    Select::make('type')
                                    ->options(
                                        $listPlugins
                                    )
                                    ->reactive(),
                                    // by matching type of plugins :
                                    // - instantiate the corresponding model
                                    // - get all instances of this model
                                    // - add them to the select input
                                    Group::make()
                                    ->schema(function ($get) {
                                        $type = $get('type');
                                        $activated = '';
                                        if ($type != null) {
                                            $modelName = 'App\Models\\' . Str::ucfirst($type);
                                            $model = new $modelName();
                                            $items = $model::class::all();

                                            foreach ($items as $item) {
                                                # code...
                                                $listItems[$item->id] = $item->title;
                                            }

                                            $activated = 'activated';
                                        }
                                        return match ($activated) {
                                            'activated' => [
                                                Select::make('id')
                                                ->options($listItems),
                                            ],
                                            default => [],
                                        };
                                    }),
                                    Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                    Toggle::make('visible')
                                    ->label('Visible')
                                    ->default(false)
                                    ->columnSpan('full'),
                                ];
                            }),
                        Builder\Block::make('image')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                                Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                Select::make('width')
                                    ->options([
                                        'full' => 'Full',
                                        'centered' => 'Centered'
                                    ])
                                    ->default('full'),
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true)
                            ]),
                        Builder\Block::make('hero')
                            ->schema([
                                TextInput::make('heroTitle')
                                    ->label('Title')
                                    ->required(),
                                MarkdownEditor::make('heroSubtitle')
                                    ->label('Sub Title')
                                    ->required(),
                                MarkdownEditor::make('heroText')
                                    ->label('Description text'),
                                FileUpload::make('heroImage')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                Select::make('heroImagePosition')
                                    ->options([
                                        'left' => 'Left',
                                        'right' => 'Right'
                                    ])
                                    ->default('right'),
                                Select::make('backgroundColor')
                                    ->options(self::$backgroundColors)
                                    ->default('bg-white'),
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true)
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
