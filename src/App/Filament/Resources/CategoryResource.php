<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Forms\Components\TextInput::make('description'),
                Select::make('color')
                    ->label('Category text color')
                    ->options([
                        'text-amber-300' => 'Amber 300',
                        'text-blue-300' => 'Blue 300',
                        'text-green-300' => 'Green 300',
                        'text-indigo-300' => 'Indigo 300',
                        'text-lime-300' => 'Lime 300',
                        'text-orange-300' => 'Orange 300',
                        'text-yellow-300' => 'Yellow 300',
                    ])
                    ->searchable(),
                Select::make('bg_color')
                    ->label('Category background color')
                    ->options([
                        'bg-amber-100' => 'Amber 100',
                        'bg-blue-100' => 'Blue 100',
                        'bg-green-100' => 'Green 100',
                        'bg-indigo-100' => 'Indigo 100',
                        'bg-lime-100' => 'Lime 100',
                        'bg-orange-100' => 'Orange 100',
                        'bg-yellow-100' => 'Yellow 100',
                    ])
                    ->searchable(),
                Select::make('pill_color')
                    ->label('Pill background color')
                    ->options([
                        'bg-gray-500' => 'Gray 500',
                        'bg-gray-700' => 'Gray 700',
                        'bg-gray-900' => 'Gray 900',
                        'bg-red-500' => 'red 500',
                        'bg-red-700' => 'red 700',
                        'bg-red-900' => 'red 900',
                        'bg-yellow-500' => 'yellow 500',
                        'bg-yellow-700' => 'yellow 700',
                        'bg-yellow-900' => 'yellow 900',
                        'bg-green-500' => 'green 500',
                        'bg-green-700' => 'green 700',
                        'bg-green-900' => 'green 900',
                        'bg-blue-500' => 'blue 500',
                        'bg-blue-700' => 'blue 700',
                        'bg-blue-900' => 'blue 900',
                        'bg-indigo-500' => 'indigo 500',
                        'bg-indigo-700' => 'indigo 700',
                        'bg-indigo-900' => 'indigo 900',
                        'bg-purple-500' => 'purple 500',
                        'bg-purple-700' => 'purple 700',
                        'bg-purple-900' => 'purple 900',
                        'bg-pink-500' => 'pink 500',
                        'bg-pink-700' => 'pink 700',
                        'bg-pink-900' => 'pink 900',
                    ])
                    ->searchable()
                // Forms\Components\Textarea::make('content'),
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
