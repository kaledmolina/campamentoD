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

    protected static ?string $navigationGroup = 'Gestión';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('key')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Tipo de Configuración')
                    ->options([
                        'registration_fee' => 'Costo de Inscripción ($)',
                        'default_total_cost' => 'Costo Total por Defecto ($)',
                        'registrations_enabled' => 'Estado de las Inscripciones (1 = Abiertas, 0 = Cerradas)',
                    ])
                    ->live()
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        $labels = [
                            'registration_fee' => 'Costo de Inscripción ($)',
                            'default_total_cost' => 'Costo Total por Defecto ($)',
                            'registrations_enabled' => 'Estado de las Inscripciones (1 = Abiertas, 0 = Cerradas)',
                        ];
                        $set('label', $labels[$state] ?? $state);
                        if ($state === 'registrations_enabled') {
                            $set('value', '1');
                        }
                    })
                    ->disabled(fn($record) => $record !== null), // Lock key after creation
                Forms\Components\Hidden::make('label'),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->numeric()
                    ->prefix(fn (Forms\Get $get) => $get('key') === 'registrations_enabled' ? '' : '$')
                    ->helperText(fn (Forms\Get $get) => $get('key') === 'registrations_enabled' ? 'Ingresa 1 para mantener las inscripciones ABIERTAS, o 0 para CERRARLAS.' : 'Ingresa el valor monetario sin puntos ni comas.')
                    ->label(fn (Forms\Get $get) => $get('key') === 'registrations_enabled' ? 'Estado (1 = Abiertas, 0 = Cerradas)' : 'Valor'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')->label('Configuración')->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Valor ACTUAL')
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->key === 'registrations_enabled') {
                            return $state == 1 ? '🟢 ABIERTAS (1)' : '🔴 CERRADAS (0)';
                        }
                        return '$' . number_format((float)$state, 2);
                    }),
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
