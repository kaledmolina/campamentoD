<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Campistas';

    protected static ?string $modelLabel = 'Campista';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre Completo'),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Select::make('document_type')
                    ->options([
                        'CC' => 'Cédula de Ciudadanía',
                        'TI' => 'Tarjeta de Identidad',
                        'PA' => 'Pasaporte',
                        'Otro' => 'Otro',
                    ])
                    ->label('Tipo de Documento'),
                TextInput::make('document_number')
                    ->unique(ignoreRecord: true)
                    ->label('Número de Documento'),
                TextInput::make('phone')
                    ->tel()
                    ->label('Celular'),
                Select::make('zone')
                    ->options([
                        'Zona Monteria' => 'Zona Monteria',
                        'Zona Alto San Jorge' => 'Zona Alto San Jorge',
                        'Zona Planeta Rica' => 'Zona Planeta Rica',
                        'Zona La Mojana' => 'Zona La Mojana',
                        'Zona Alto Sinu' => 'Zona Alto Sinu',
                        'Zona Bajo Sinu' => 'Zona Bajo Sinu',
                        'Zona Medio Sinu' => 'Zona Medio Sinu',
                        'Zona San Marcos' => 'Zona San Marcos',
                        'Zona Sahagun' => 'Zona Sahagun',
                        'Zona Franja del Mar' => 'Zona Franja del Mar',
                        'Otro' => 'Otro',
                    ])
                    ->searchable()
                    ->live()
                    ->afterStateHydrated(function (Select $component, $state) {
                        $standardZones = [
                            'Zona Monteria',
                            'Zona Alto San Jorge',
                            'Zona Planeta Rica',
                            'Zona La Mojana',
                            'Zona Alto Sinu',
                            'Zona Bajo Sinu',
                            'Zona Medio Sinu',
                            'Zona San Marcos',
                            'Zona Sahagun',
                            'Zona Franja del Mar',
                        ];

                        if ($state && !in_array($state, $standardZones)) {
                            $component->state('Otro');
                        }
                    })
                    ->mutateDehydratedStateUsing(fn($state, Forms\Get $get) => $state === 'Otro' ? $get('other_zone') : $state)
                    ->label('Zona'),
                TextInput::make('other_zone')
                    ->label('¿Cuál Zona?')
                    ->visible(fn(Forms\Get $get) => $get('zone') === 'Otro')
                    ->required(fn(Forms\Get $get) => $get('zone') === 'Otro')
                    ->dehydrated(false) // Do not save this field directly
                    ->afterStateHydrated(function (TextInput $component, $record) {
                        if ($record) {
                            $standardZones = [
                                'Zona Monteria',
                                'Zona Alto San Jorge',
                                'Zona Planeta Rica',
                                'Zona La Mojana',
                                'Zona Alto Sinu',
                                'Zona Bajo Sinu',
                                'Zona Medio Sinu',
                                'Zona San Marcos',
                                'Zona Sahagun',
                                'Zona Franja del Mar',
                            ];

                            if ($record->zone && !in_array($record->zone, $standardZones)) {
                                $component->state($record->zone);
                            }
                        }
                    }),
                TextInput::make('congregacion')
                    ->label('Congregación'),
                TextInput::make('participation_cost')
                    ->numeric()
                    ->prefix('$')
                    ->label('Costo Personalizado')
                    ->helperText('Dejar vacío para usar costo global ($300.000)'),
                TextInput::make('age')
                    ->numeric()
                    ->label('Edad'),
                Toggle::make('is_admin')
                    ->label('Es Administrador'),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('is_admin', false);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->label('Nombre'),
                TextColumn::make('document_number')->searchable()->label('Documento'),
                TextColumn::make('age')
                    ->label('Edad')
                    ->badge()
                    ->color(fn(string $state): string => $state < 18 ? 'danger' : 'success')
                    ->formatStateUsing(fn(string $state) => $state . ($state < 18 ? ' (Menor)' : '')),
                TextColumn::make('zone')->sortable()->label('Zona'),
                TextColumn::make('congregacion')->searchable()->label('Congregación'),
                TextColumn::make('total_paid')
                    ->label('Total Abonado')
                    ->money('COP'),
                TextColumn::make('balance')
                    ->label('Pendiente')
                    ->money('COP')
                    ->color(fn($state) => $state > 0 ? 'danger' : 'success'),
            ])
            ->filters([
                SelectFilter::make('zone')
                    ->options([
                        'Zona Monteria' => 'Zona Monteria',
                        'Zona Alto San Jorge' => 'Zona Alto San Jorge',
                        'Zona Planeta Rica' => 'Zona Planeta Rica',
                        'Zona La Mojana' => 'Zona La Mojana',
                        'Zona Alto Sinu' => 'Zona Alto Sinu',
                        'Zona Bajo Sinu' => 'Zona Bajo Sinu',
                        'Zona Medio Sinu' => 'Zona Medio Sinu',
                        'Zona San Marcos' => 'Zona San Marcos',
                        'Zona Sahagun' => 'Zona Sahagun',
                        'Zona Franja del Mar' => 'Zona Franja del Mar',
                    ])
                    ->label('Zona'),
                SelectFilter::make('document_type')
                    ->options([
                        'CC' => 'Cédula de Ciudadanía',
                        'TI' => 'Tarjeta de Identidad',
                        'PA' => 'Pasaporte',
                        'Otro' => 'Otro',
                    ])
                    ->label('Tipo de Documento'),
                Tables\Filters\Filter::make('minors')
                    ->label('Solo Menores de Edad')
                    ->query(fn(Builder $query): Builder => $query->where('age', '<', 18)),
                Tables\Filters\Filter::make('has_payments')
                    ->label('Con Abonos Realizados')
                    ->query(fn(Builder $query): Builder => $query->has('payments')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(fn(User $record): string => UserResource::getUrl('view', ['record' => $record]));
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Información Personal')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')->label('Nombre'),
                        TextEntry::make('email')->label('Correo'),
                        TextEntry::make('document_type')->label('Tipo Doc'),
                        TextEntry::make('document_number')->label('Número Doc'),
                        TextEntry::make('phone')->label('Celular'),
                        TextEntry::make('age')
                            ->label('Edad')
                            ->badge()
                            ->color(fn(int $state): string => $state < 18 ? 'danger' : 'success')
                            ->formatStateUsing(fn(int $state) => $state . ($state < 18 ? ' (Menor)' : '')),
                        ImageEntry::make('consent_proof_path')
                            ->label('Consentimiento Firmado')
                            ->columnSpan(2)
                            ->visible(fn($record) => $record->age < 18)
                            ->disk('public'),
                    ]),
                Section::make('Información Eclesiástica')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('zone')->label('Zona'),
                        TextEntry::make('congregacion')->label('Congregación'),
                    ]),
                Section::make('Estado de Cuenta')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('total_paid')->money('COP')->label('Total Abonado'),
                        TextEntry::make('balance')->money('COP')->label('Saldo Pendiente')
                            ->color(fn($state) => $state > 0 ? 'danger' : 'success'),
                        TextEntry::make('target_cost')->money('COP')->label('Costo Total'),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
