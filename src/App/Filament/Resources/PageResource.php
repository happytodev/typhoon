<?php

namespace App\Filament\Resources;

use Closure;
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
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
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
                Section::make('Content')
                    ->schema([
                        Builder::make('content')
                        ->blocks([
                        // HEADING
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
                        // HERO
                        Builder\Block::make('hero')
                        ->icon('heroicon-o-star')
                        ->schema([
                            Section::make('Hero block global settings')
                                ->collapsible()
                                ->columns(2)
                                ->schema([
                                    Toggle::make('visible')
                                        ->label('Visible')
                                        ->columnSpan(1)
                                        ->default(true),
                                    Select::make('heroHeight')
                                        ->columnSpan(1)
                                        ->label('Define minimum height of Hero block (in % of the screen)')
                                        ->options([
                                            'content' => 'Content size',
                                            'sm:h-screen-1/10' => '10% of screen height',
                                            'sm:h-screen-1/6' => '1/6 of screen height',
                                            'sm:h-screen-1/5' => '20% of screen height',
                                            'sm:h-screen-1/4' => '25% of screen height',
                                            'sm:h-screen-1/3' => '30% of screen height',
                                            'sm:h-screen-1/2' => '50% of screen height',
                                            'sm:h-screen' => '100% of screen height',
                                            'sm:min-h-screen-1/10' => 'min 10% of screen height',
                                            'sm:min-h-screen-1/6' => 'min 1/6 of screen height',
                                            'sm:min-h-screen-1/5' => 'min 20% of screen height',
                                            'sm:min-h-screen-1/4' => 'min 25% of screen height',
                                            'sm:min-h-screen-1/3' => 'min 30% of screen height',
                                            'sm:min-h-screen-1/2' => 'min 50% of screen height',
                                            'sm:max-h-screen-1/10' => 'max 10% of screen height',
                                            'sm:max-h-screen-1/6' => 'max 1/6 of screen height',
                                            'sm:max-h-screen-1/5' => 'max 20% of screen height',
                                            'sm:max-h-screen-1/4' => 'max 25% of screen height',
                                            'sm:max-h-screen-1/3' => 'max 30% of screen height',
                                            'sm:max-h-screen-1/2' => 'max 50% of screen height'
                                        ])
                                        ->default('content')
                                ]),
                            Section::make('Main content')
                                ->columns(2)
                                ->schema([
                                    Grid::make(2)
                                    ->schema([
                                        TextInput::make('heroTitle')
                                            ->label('Title')
                                            ->required(),
                                        Select::make('heroTitleTextSize')
                                            ->options([
                                                '7' => 'text-7xl', // 'sm:text-7xl'  'sm:text-xl'
                                                '6' => 'text-6xl', // 'sm:text-6xl'
                                                '5' => 'text-5xl', // 'sm:text-5xl'
                                                '4' => 'text-4xl', // 'sm:text-4xl'
                                                '3' => 'text-3xl', // 'sm:text-3xl'
                                                '2' => 'text-2xl', // 'sm:text-2xl'
                                            ])
                                    ]),
                                    Grid::make(2)
                                        ->schema([
                                            MarkdownEditor::make('heroSubtitle')
                                                ->label('Sub Title')
                                                ->required(),
                                            MarkdownEditor::make('heroText')
                                                ->label('Description text')
                                        ]),
                                ]),
                            Section::make('Background image')
                                ->collapsed()
                                ->schema([
                                    Grid::make()
                                    ->columns(2)
                                    ->schema([
                                        // Grid::make(2)
                                        // ->schema([
                                        Fieldset::make('Image')
                                            ->columns(1)
                                            ->columnSpan(1)
                                            ->schema([
                                                FileUpload::make('heroImage')
                                                // ->columnSpan(1)
                                                ->label('Choose your image')
                                                ->image(),
                                                Select::make('heroImageBackgroundSize')
                                                ->label('Choose how your image will fill the background')
                                                ->options([
                                                    'bg-auto' => 'Auto',
                                                    'bg-cover' => 'Cover',
                                                    'bg-contain' => 'Contain'
                                                ]),
                                                Select::make('heroImageBackgroundPosition')
                                                ->label('Choose the position of your background image')
                                                ->options([
                                                    'bg-bottom'	=> 'Bottom',
                                                    'bg-center' => 'Center',
                                                    'bg-left' => 'left',
                                                    'bg-left-bottom' => 'Bottom left',
                                                    'bg-left-top' => 'Top left',
                                                    'bg-right' => 'Right',
                                                    'bg-right-bottom' => 'Bottom right',
                                                    'bg-right-top' => 'Top right',
                                                    'bg-top' => 'Top'
                                                ])
                                        ]),

                                        Fieldset::make('Image details')
                                            ->columns(1)
                                            ->columnSpan(1)
                                            ->schema([
                                                Select::make('heroImagePosition')
                                                ->options([
                                                    'left' => 'Left',
                                                    'right' => 'Right',
                                                    'background' => 'Background'
                                                ])
                                                ->default('right')
                                                ->reactive(),
                                                Select::make('heroBackgroundTextPosition')
                                                    ->label('Position of text block and CTA')
                                                    ->options([
                                                        'items-start' => 'Left',
                                                        'items-center' => 'Center',
                                                        'items-end' => 'Right',
                                                    ])
                                                    ->hidden(fn (Closure $get) => $get('heroImagePosition') !== 'background'),
                                                    // backdrop-brightness-0 backdrop-opacity-10 backdrop-invert bg-red-500/30 h-full
                                                Select::make('heroBackgroundBackdropBrightness')
                                                    ->label('Brightness of the background')
                                                    ->options([
                                                        'backdrop-brightness-0' => '0',
                                                        'backdrop-brightness-50' => '50',
                                                        'backdrop-brightness-100' => '100',
                                                        'backdrop-brightness-150' => '150',
                                                        'backdrop-brightness-200' => '200',
                                                    ])
                                                    ->hidden(fn (Closure $get) => $get('heroImagePosition') !== 'background'),
                                                Select::make('heroBackgroundBackdropOpacity')
                                                    ->label('Opacity of the background')
                                                    ->options([
                                                        'backdrop-opacity-0' => '0',
                                                        'backdrop-opacity-10' => '10',
                                                        'backdrop-opacity-25' => '25',
                                                        'backdrop-opacity-50' => '50',
                                                        'backdrop-opacity-75' => '75',
                                                        'backdrop-opacity-100' => '100',
                                                    ])
                                                    ->hidden(fn (Closure $get) => $get('heroImagePosition') !== 'background'),
                                                Toggle::make('heroBackgroundBackdropInvert')
                                                    ->label('Invert the...')
                                                    ->hidden(fn (Closure $get) => $get('heroImagePosition') !== 'background'),
                                                TailwindColorPicker::make('heroBackgroundBackdropColor')
                                                    ->hidden(fn (Closure $get) => $get('heroImagePosition') !== 'background')
                                                    ->bgScope()
                                                    ->onlyOpacity()
                                            ]),
                                            // ->columns(2)
                                        ]),
                                ]),
                            Section::make('CTA')
                                ->collapsed()
                                ->schema([
                                    Grid::make(2)
                                        ->schema([
                                            Grid::make(2)
                                                ->columnSpan(1)
                                                ->schema([
                                                    Toggle::make('heroCtaVisible')
                                                        ->label('Visible ?')
                                                        ->inline(false)
                                                        ->default(false)
                                                        ->columnSpan(1),
                                                    Toggle::make('heroCtaButtonGlowing')
                                                        ->label('Glowing button ?')
                                                        ->inline(false)
                                                        ->default(false)
                                                        ->columnSpan(1)
                                                ]),
                                            TextInput::make('heroCtaButtonText')
                                                ->label('Teaser text for click to action')
                                                ->columnSpan(1),
                                            TailwindColorPicker::make('heroCtaButtonBackgroundColor')
                                                ->label('Background color of CTA button')
                                                ->bgScope()
                                                ->columnSpan(1),
                                            TailwindColorPicker::make('heroCtaButtonTextColor')
                                                ->label('Text color of CTA button')
                                                ->textScope()
                                                ->columnSpan(1),
                                            TextInput::make('heroCtaUrl')
                                                ->label('Url for action')
                                                ->url()
                                                ->columnSpan(1),
                                            Toggle::make('heroCtaUrlTarget')
                                                ->label('Open in new tab ?')
                                                ->inline(false)
                                                ->default(true)
                                                ->columnSpan(1),
                                        ])
                            ]),
                            Section::make('Flying icon')
                                ->collapsed()
                                ->schema([
                                    Grid::make(2)
                                    ->schema([
                                        Grid::make(2)
                                        ->schema([
                                            Toggle::make('heroArtIconVisible')
                                            ->label('Visible')
                                            ->default(true),
                                            Toggle::make('heroArtIconInvertColor')
                                            ->label('Invert color ?')
                                            ->default(false)
                                        ]),
                                        FileUpload::make('heroArtIcon')
                                        ->label('Art icon')
                                        ->columnSpan(1)
                                        ->image(),

                                        Fieldset::make('Icon details')
                                            ->columns(1)
                                            ->columnSpan(1)
                                            ->schema([

                                                Select::make('heroArtIconHeight')
                                                    ->options([
                                                        'h-[1rem] lg:h-[1.3rem]' => 'Extra small',
                                                        'h-[2rem] lg:h-[2.6rem]' => 'Small',
                                                        'h-[4rem] lg:h-[5.2rem]' => 'Medium',
                                                        'h-[8rem] lg:h-[10.4rem]' => 'Large',
                                                        'h-[16rem] lg:h-[20.8rem]' => 'Extra large',
                                                        'h-[24rem] lg:h-[31.2rem]' => 'Extra extra large'
                                                    ])
                                                    ->default('h-[4rem] lg:h-[5.2rem]'),
                                                Select::make('heroArtIconOffsetX')
                                                    ->options([
                                                        'left-0 top-0' => "Top Left",
                                                        'left-8 top-8' => "Top Left - offset 8",
                                                        'left-8 top-16' => "Top Left - offset 8-16",
                                                        'left-8 top-32' => "Top Left - offset 8-32",
                                                        'left-8 top-64' => "Top Left - offset 8-64",
                                                        'left-16 top-8' => "Top Left - offset 16-8",
                                                        'left-16 top-16' => "Top Left - offset 16",
                                                        'left-16 top-32' => "Top Left - offset 16-32",
                                                        'left-16 top-64' => "Top Left - offset 16-64",
                                                        'left-32 top-8' => "Top Left - offset 32-8",
                                                        'left-32 top-16' => "Top Left - offset 32-16",
                                                        'left-32 top-32' => "Top Left - offset 32",
                                                        'left-32 top-64' => "Top Left - offset 32-64",
                                                        'left-64 top-8' => "Top Left - offset 64-8",
                                                        'left-64 top-16' => "Top Left - offset 64-16",
                                                        'left-64 top-32' => "Top Left - offset 64-32",
                                                        'left-64 top-64' => "Top Left - offset 64",
        
                                                        'right-0 top-0' => "Top right",
                                                        'right-8 top-8' => "Top right - offset 8",
                                                        'right-8 top-16' => "Top right - offset 8-16",
                                                        'right-8 top-32' => "Top right - offset 8-32",
                                                        'right-8 top-64' => "Top right - offset 8-64",
                                                        'right-16 top-8' => "Top right - offset 16-8",
                                                        'right-16 top-16' => "Top right - offset 16",
                                                        'right-16 top-32' => "Top right - offset 16-32",
                                                        'right-16 top-64' => "Top right - offset 16-64",
                                                        'right-32 top-8' => "Top right - offset 32-8",
                                                        'right-32 top-16' => "Top right - offset 32-16",
                                                        'right-32 top-32' => "Top right - offset 32",
                                                        'right-32 top-64' => "Top right - offset 32-64",
                                                        'right-64 top-8' => "Top right - offset 64-8",
                                                        'right-64 top-16' => "Top right - offset 64-16",
                                                        'right-64 top-32' => "Top right - offset 64-32",
                                                        'right-64 top-64' => "Top right - offset 64",
        
                                                        'left-0 bottom-0' => "bottom Left",
                                                        'left-8 bottom-8' => "bottom Left - offset 8",
                                                        'left-8 bottom-16' => "bottom Left - offset 8-16",
                                                        'left-8 bottom-32' => "bottom Left - offset 8-32",
                                                        'left-8 bottom-64' => "bottom Left - offset 8-64",
                                                        'left-16 bottom-8' => "bottom Left - offset 16-8",
                                                        'left-16 bottom-16' => "bottom Left - offset 16",
                                                        'left-16 bottom-32' => "bottom Left - offset 16-32",
                                                        'left-16 bottom-64' => "bottom Left - offset 16-64",
                                                        'left-32 bottom-8' => "bottom Left - offset 32-8",
                                                        'left-32 bottom-16' => "bottom Left - offset 32-16",
                                                        'left-32 bottom-32' => "bottom Left - offset 32",
                                                        'left-32 bottom-64' => "bottom Left - offset 32-64",
                                                        'left-64 bottom-8' => "bottom Left - offset 64-8",
                                                        'left-64 bottom-16' => "bottom Left - offset 64-16",
                                                        'left-64 bottom-32' => "bottom Left - offset 64-32",
                                                        'left-64 bottom-64' => "bottom Left - offset 64",
        
                                                        'right-0 bottom-0' => "bottom right",
                                                        'right-8 bottom-8' => "bottom right - offset 8",
                                                        'right-8 bottom-16' => "bottom right - offset 8-16",
                                                        'right-8 bottom-32' => "bottom right - offset 8-32",
                                                        'right-8 bottom-64' => "bottom right - offset 8-64",
                                                        'right-16 bottom-8' => "bottom right - offset 16-8",
                                                        'right-16 bottom-16' => "bottom right - offset 16",
                                                        'right-16 bottom-32' => "bottom right - offset 16-32",
                                                        'right-16 bottom-64' => "bottom right - offset 16-64",
                                                        'right-32 bottom-8' => "bottom right - offset 32-8",
                                                        'right-32 bottom-16' => "bottom right - offset 32-16",
                                                        'right-32 bottom-32' => "bottom right - offset 32-32",
                                                        'right-32 bottom-64' => "bottom right - offset 32-64",
                                                        'right-64 bottom-8' => "bottom right - offset 64-8",
                                                        'right-64 bottom-16' => "bottom right - offset 64-16",
                                                        'right-64 bottom-32' => "bottom right - offset 64-32",
                                                        'right-64 bottom-64' => "bottom right - offset 64-64",
        
        
                                                    ])
                                                    ->default('left-0 top-0'),
                                                // TailwindColorPicker::make('heroArtIconColor')
                                                //     ->textScope()
                                                Select::make('heroArtIconOpacity')
                                                    ->options([
                                                        'opacity-0' => '0%',
                                                        'opacity-5' => '5%',
                                                        'opacity-10' => '10%',
                                                        'opacity-25' => '25%',
                                                        'opacity-50' => '50%',
                                                        'opacity-75' => '75%',
                                                        'opacity-100' => '100%',
                                                    ])
                                                    ->default('opacity-100')
                                                ]),
                                        Grid::make(3)
                                                ->schema([

                                                    Toggle::make('heroArtIconRotate')
                                                        ->label('Rotate')
                                                        ->inline(false)
                                                        ->default(false),
                                                    Toggle::make('heroArtIconRotateInverse')
                                                        ->label('Inverse rotation ?')
                                                        ->inline(false)
                                                        ->default(false),
                                                        // DON'T DELETE THIS COMMENT IT IS MANDATORY FOR
                                                        // CSS GENERATION OF NEGATIVE ROTATION WITH TAILWIND
                                                        // -rotate-1
                                                        // -rotate-2
                                                        // -rotate-3
                                                        // -rotate-6
                                                        // -rotate-12
                                                        // -rotate-45
                                                        // -rotate-90
                                                        // -rotate-180
                                                    Select::make('heroArtIconRotateAngle')
                                                        ->label('Rotation angle')
                                                        ->options([
                                                            'rotate-0' => 'Rotate 0',
                                                            'rotate-1' => 'Rotate 1',
                                                            'rotate-2' => 'Rotate 2',
                                                            'rotate-3' => 'Rotate 3',
                                                            'rotate-6' => 'Rotate 6',
                                                            'rotate-12' => 'Rotate 12',
                                                            'rotate-45' => 'Rotate 45',
                                                            'rotate-90' => 'Rotate 90',
                                                            'rotate-180' => 'Rotate 180'
                                                        ])
                                                        ->default('rotate-0'),
                                                ])
                                    ]),
                                ]),

                            Section::make('Colors')
                                ->collapsed()
                                ->schema([
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
                                            ])
                                    ])
                                ])
                        ]),
                        // IMAGE
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
                        // PARAGRAPH
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
                        // PLUGINS
                        Builder\Block::make('plugins')
                            ->icon('heroicon-o-puzzle')
                            ->schema(function () {
                                // get the list of installed plugins
                                $listPlugins = config('typhoon.plugins');
                                if (count($listPlugins) == 0) {
                                    $listPlugins = ['No plugins available for now. To use this block, please install a plugin.'];
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
                        // SEPARATOR
                        Builder\Block::make('separator')
                        ->icon('heroicon-o-view-grid')
                        ->schema([
                            Select::make('separatorType')
                                ->options([
                                    'curved-line' => 'Curved line',
                                    'broken-line' => 'Broken line',
                                    'pixelator' => 'Pixelator',
                                    'sure' => 'Sure ?',
                                    'ok-lets-go' => 'OK Let\'s go !',
                                    'sharp-line' => 'Sharp line',
                                ]),
                            TailwindColorPicker::make('backgroundColor')
                                ->bgScope(),
                            TailwindColorPicker::make('fillColor1')
                                ->fillScope(),
                            TailwindColorPicker::make('fillColor2')
                                ->fillScope(),
                            Toggle::make('visible')
                                ->label('Visible')
                                ->default(true)
                        ]),
                        // FEATURED POSTS
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
                                ->label('Featured Post limit to display')
                                ->numeric()
                                ->minValue(1)
                                ->maxValue(99),
                            TailwindColorPicker::make('backgroundColor')
                                ->bgScope(),
                            Toggle::make('visible')
                                ->label('Visible')
                                ->default(true)
                        ]),
                        // LATEST POSTS
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
                                    ->label('Latest Post limit to display')
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(99),
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
