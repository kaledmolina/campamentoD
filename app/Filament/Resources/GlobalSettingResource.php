<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GlobalSettingResource\Pages;
use App\Models\GlobalSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GlobalSettingResource extends Resource
{
    protected static ?string $model = GlobalSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Configuración';

    protected static ?string $modelLabel = 'Configuración';

    protected static ?string $pluralModelLabel = 'Configuraciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('key')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Tipo de Configuración')
                    ->options([
                        'registration_fee' => 'Costo de Inscripción',
                        'default_total_cost' => 'Costo Total por Defecto',
                    ])
                    ->live()
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        $labels = [
                            'registration_fee' => 'Costo de Inscripción',
                            'default_total_cost' => 'Costo Total por Defecto',
                        ];
                        $set('label', $labels[$state] ?? $state);
                    })
                    ->disabled(fn($record) => $record !== null), // Lock key after creation
                Forms\Components\Hidden::make('label'),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->label('Valor'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')->label('Configuración')->searchable(),
                Tables\Columns\TextColumn::make('value')->label('Valor ACTUAL'),
                Tables\Columns\TextColumn::make('key')->label('Clave')->color('gray')->size('xs'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Prevent bulk delete to avoid accidents
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGlobalSettings::route('/'),
            'create' => Pages\CreateGlobalSetting::route('/create'),
            'edit' => Pages\EditGlobalSetting::route('/{record}/edit'),
        ];
    }
}
