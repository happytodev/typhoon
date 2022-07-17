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

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->reactive()
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
