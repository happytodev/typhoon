<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Tables;
use App\Models\Setting;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\SettingResource\Pages;
use MartinRo\FilamentCharcountField\Components\CharcountedTextInput;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    CharcountedTextInput::make('key')
                        ->required()
                        ->maxLength(100)
                        ->minLength(3)
                        ->minCharacters(3)
                        ->maxCharacters(100),
                    Select::make('type')
                        ->options([
                            'image' => 'Image',
                            'richeditor' => 'Rich Editor',
                            'string' => 'String',
                            'textarea' => 'Text Area',
                            'toggle' => 'Toggle',
                        ])
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function (Closure $set, $state) {
                            match ($state) {
                                'image' => $set('value', []), // File upload components always need a an array state
                                default => $set('value', null),
                            };
                        }),

                    Group::make()
                    ->schema(function ($get) {
                        $type = $get('type');
                        return match ($type) {
                            'image' => [FileUpload::make('value')->required()],
                            'richeditor' => [RichEditor::make('value')->required()],
                            'string' => [
                                CharcountedTextInput::make('value')
                                    ->required()
                                    ->maxLength(255)
                                    ->minLength(1)
                                    ->minCharacters(1)
                                    ->maxCharacters(255),
                            ],
                            'textarea' => [Textarea::make('value')->required()],
                            'toggle' => [
                                Toggle::make('value')
                                    ->required()
                                    ->onIcon('heroicon-s-sun')
                                    ->offIcon('heroicon-s-moon')
                            ],
                            default => [],
                        };
                    })->columnSpan('full')
                ])->columns(2),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('key'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('value'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}