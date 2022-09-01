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
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use HappyToDev\FilamentTailwindColorPicker\Forms\Components\TailwindColorPicker;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

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
                            ->icon('heroicon-o-bookmark')
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
                                Grid::make(2)
                                ->schema([
                                    TailwindColorPicker::make('backgroundColor')
                                    ->bgScope()
                                    ->label('Background color of heading block')
                                    ->helperText('The color used for the background of the heading'),
                                    TailwindColorPicker::make('titleColor')
                                    ->textScope()
                                    ->label('Color of the title')
                                    ->helperText('The color used for the title of the heading'),
                                    Toggle::make('visible')
                                    ->label('Visible')
                                    ->default(true)
                                ])
                                ->columns(2)
                            ]),
                            Builder\Block::make('hero')
                            ->icon('heroicon-o-star')
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
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true),
                                Tabs::make('TabColors')
                                ->tabs([
                                    Tabs\Tab::make('Title text color')
                                        ->schema([
                                            // ...
                                            TailwindColorPicker::make('titleTextColor')
                                            ->textScope(),
                                        ]),
                                    Tabs\Tab::make('Subtitle text color')
                                        ->schema([
                                            // ...
                                            TailwindColorPicker::make('subtitleTextColor')
                                            ->textScope(),
                                        ]),
                                    Tabs\Tab::make('Description text color')
                                        ->schema([
                                            // ...
                                            TailwindColorPicker::make('descriptionTextColor')
                                            ->textScope(),
                                        ]),
                                    Tabs\Tab::make('Background color')
                                        ->schema([
                                            // ...
                                            TailwindColorPicker::make('backgroundColor')
                                            ->bgScope(),
                                        ]),
                                ])
                            ]),
                            Builder\Block::make('image')
                            ->icon('heroicon-o-photograph')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                                TailwindColorPicker::make('backgroundColor')
                                    ->bgScope(),
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
                        Builder\Block::make('paragraph')
                            ->icon('heroicon-o-view-list')
                            ->schema([
                                MarkdownEditor::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                                TailwindColorPicker::make('backgroundColor')
                                    ->bgScope(),
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true)
                            ]),
                        Builder\Block::make('plugins')
                            ->icon('heroicon-o-puzzle')
                            ->schema(function () {
                                // get the list of installed plugins
                                $listPlugins = config('typhoon.plugins');
                                if (count($listPlugins) == 0) {
                                    $listPlugins = ['No plugins available for now. Tu use this block, please install a plugin.'];
                                }
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
                                    TailwindColorPicker::make('backgroundColor')
                                        ->bgScope(),
                                    Toggle::make('visible')
                                    ->label('Visible')
                                    ->default(false)
                                    ->columnSpan('full'),
                                ];
                            }),


                        Builder\Block::make('featured-post')
                        ->icon('heroicon-o-view-grid')
                        ->schema([
                            TextInput::make('featuredPostsTitle')
                                ->label('Featured Post title')
                                ->required(),
                            MarkdownEditor::make('featuredPostsDescription')
                                ->label('Description of featured block')
                                ->required(),
                            TextInput::make('featuredPostsNumber')
                                ->label('Featured Post limit to display'),
                                TailwindColorPicker::make('backgroundColor')
                                ->bgScope(),
                            Toggle::make('visible')
                                ->label('Visible')
                                ->default(true)
                        ]),
                        Builder\Block::make('latest-post')
                            ->icon('heroicon-o-view-grid')
                            ->schema([
                                TextInput::make('latestPostsTitle')
                                    ->label('Latest Post title')
                                    ->required(),
                                MarkdownEditor::make('latestPostsDescription')
                                    ->label('Description of latest block')
                                    ->required(),
                                TextInput::make('latestPostsNumber')
                                    ->label('Latest Post limit to display'),
                                    TailwindColorPicker::make('backgroundColor')
                                        ->bgScope(),
                                Toggle::make('visible')
                                        ->label('Visible')
                                        ->default(true)
                            ])
                        ])
                        ->collapsible(),
                ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
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
