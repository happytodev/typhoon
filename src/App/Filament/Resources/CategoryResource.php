<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use HappyToDev\FilamentTailwindColorPicker\Forms\Components\TailwindColorPicker;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->reactive()
                    ->required()
                    ->minLength(3)
                    ->maxLength(30)
                    ->afterStateUpdated(function ($set, ?string $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\TextInput::make('description'),
                Grid::make([
                    'default' => 1,
                    'sm' => 2,
                    // 'md' => 3,
                    'xl' => 3,
                    // 'xl' => 6,
                    // '2xl' => 8,
                ])
                // Grid::make(3)
                    ->schema([
                        TailwindColorPicker::make('color')
                            ->label('Category text color')
                            ->helperText('The color used for the category name')
                            ->textScope(),
                            TailwindColorPicker::make('bg_color')
                            ->label('Category Background color')
                            ->helperText('The color used as background for the posts belong to this category')
                            ->bgScope(),
                            TailwindColorPicker::make('pill_color')
                            ->label('Category Pill color')
                            ->helperText('The color used for the category pill')
                            ->bgScope()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
