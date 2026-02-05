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

    public static function getZonesData(): array
    {
        return [
            'Zona Franja del Mar' => [
                'El Zulia',
                'Santa Clara',
                'Marralu',
                'El Pantano',
                'Morindo',
                'Puerto Escondido',
                'Arizal',
                'Aguas Vivas (Villa Claret)',
                'Popayán',
                'El Ébano',
                'Canalete',
                'Sabalito',
            ],
            'Zona San Marcos' => [
                'Central',
                'Segunda (Las Maravillas)',
                'Tercera (La Candelaria)',
                'Buena Vista',
                'La Florida',
                'Cuenca',
                'Aguas Vivas',
                'Palo Alto',
            ],
            'Zona Bajo Sinú' => [
                'Barbacoas',
                'Chima',
                'Momil',
                'Purísima',
                'Segunda Lorica',
                'Central Lorica',
                'Tercera Lorica',
                'San Antero',
                'Porvenir',
                'San Bernardo',
                'Salado',
                'La Doctrina',
                'Moñitos',
            ],
            'Zona Alto Sinú' => [
                'Central Tierralta',
                'Segunda Tierralta',
                'Tercera Tierralta',
                'Cuarta Tierralta',
                'Quinta Tierralta',
                'Sexta Tierralta',
                'Séptima Tierralta',
                'Tres Palmas / Costa de Oro',
                'El Rosario',
                'Las Delicias',
                'Mazamorra',
                'Campo Bello',
                'Crucito',
                'Dossa',
                'Batata',
                'Santa Marta',
            ],
            'Zona Planeta Rica' => [
                'Central Planeta Rica',
                'Segunda Planeta Rica',
                'Tercera Planeta Rica',
                'Cuarta Planeta Rica',
                'Puerto Santo',
                'Campo Bello',
                'Santiago del Sur',
                'Neiva',
                'Buenos Aires (La Manta)',
                'Buenavista (Córdoba)',
                'Pueblo Nuevo',
                'Centro Alegre',
            ],
            'Zona Alto San Jorge' => [
                'Ayapel Central',
                'Ayapel Segunda',
                'Ayapel Tercera',
                'Playa Blanca',
                'La Apartada',
                'Central Montelíbano',
                'Segunda Montelíbano',
                'Tercera Montelíbano',
                'Cuarta Montelíbano',
                'Quinta Montelíbano',
                'Sexta Montelíbano',
                'Central Puerto Libertador',
                'Segunda Puerto Libertador',
                'Tercera Puerto Libertador',
                'Tierradentro',
                'Pica Pica',
                'Juan José',
                'San José de Ure',
                'Torno Rojo',
                'San Juan',
            ],
            'Zona Montería' => [
                'Central Montería',
                'Samaria',
                'Policarpa',
                'La Julia',
                'Santa Fe',
                'Alfonso López',
                'Galilea',
                'La Esperanza',
                'Villa Melisa',
                'Robinson Pitalua',
                'El Alivio',
                'Paraíso',
                'Villa Jiménez',
                'Villa Rosario',
                'Nueva Jerusalén',
                'Cantaclaro',
                'Centro',
                'Villa Cielo',
                'El Sabanal',
                'Mocarí',
                'Garzones',
                'La Castellana',
                'Sucre',
                'Nueva Esperanza',
                'Juan XXIII',
                'El Dorado',
                'El Níspero',
                'Rancho Grande',
                'La Vid',
                'Santa Teresa',
                'San Anterito',
                'Las Palomas',
                'Jaraquiel',
                'Leticia',
                'Pueblo Búho',
                'Carrizal',
            ],
            'Zona Medio Sinú' => [
                'Central Cereté',
                'Segunda Cereté',
                'Tercera Cereté',
                'Pelayo',
                'Carrillo',
                'Cotorra',
                'Retiro de los Indios',
                'Ciénaga de Oro',
                'Berastigue',
                'San Carlos',
                'Bonga Mella',
            ],
            'Zona Sahagún' => [
                'Central Sahagún',
                'Segunda Sahagún (Corea)',
                'Tercera Sahagún',
                'Cuarta Sahagún (Los Laureles)',
                'Quinta Sahagún (De las Américas)',
                'Sexta Sahagún',
                'Laguneta',
                'Escobalito',
            ],
            'Zona Mojana' => [
                'Campo Alegre',
                'Travesía',
                'Sucre, Sucre',
                'Bajo Grande',
                'El Naranjo',
                'Mina 6',
                'Montecristo',
                'Guaranda',
                'Majagual',
                'Achí',
                'Nueva Esperanza',
                'Villa Gómez',
                'San Jacinto',
                'Boca de las Mujeres',
                'San Matías',
            ],

        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombres'),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Apellidos'),
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
                Forms\Components\Select::make('registration_type')
                    ->label('Tipo de Inscripción')
                    ->options([
                        'partial' => 'Estadía Parcial ($120.000)',
                        'total' => 'Investidura Total ($300.000)',
                    ])
                    ->required(),
                TextInput::make('document_number')
                    ->unique(ignoreRecord: true)
                    ->label('Número de Documento'),
                Forms\Components\DatePicker::make('document_issue_date')
                    ->label('Fecha de Expedición')
                    ->required(),
                Select::make('gender')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ])
                    ->label('Sexo')
                    ->required(),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Fecha de Nacimiento')
                    ->required(),
                TextInput::make('eps')
                    ->label('EPS')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->label('Celular'),
                Select::make('zone')
                    ->options(function () {
                        $zones = array_keys(self::getZonesData());
                        return array_combine($zones, $zones) + ['Otro Distrito' => 'Otro Distrito'];
                    })
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(fn(Forms\Set $set) => $set('congregacion', null))
                    ->afterStateHydrated(function (Select $component, $state) {
                        $standardZones = array_keys(self::getZonesData());
                        if ($state && !in_array($state, $standardZones)) {
                            $component->state('Otro Distrito');
                        }
                    })
                    ->mutateDehydratedStateUsing(fn($state, Forms\Get $get) => $state === 'Otro Distrito' ? $get('other_zone') : $state)
                    ->label('Zona'),
                TextInput::make('other_zone')
                    ->label('¿Cuál Zona?')
                    ->visible(fn(Forms\Get $get) => $get('zone') === 'Otro Distrito')
                    ->required(fn(Forms\Get $get) => $get('zone') === 'Otro Distrito')
                    ->dehydrated(false) // Do not save this field directly
                    ->afterStateHydrated(function (TextInput $component, $record) {
                        if ($record) {
                            $standardZones = array_keys(self::getZonesData());
                            if ($record->zone && !in_array($record->zone, $standardZones)) {
                                $component->state($record->zone);
                            }
                        }
                    }),
                Forms\Components\FileUpload::make('pastor_letter_path')
                    ->label('Carta de Aval Pastoral')
                    ->directory('pastor_letters')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->openable()
                    ->downloadable()
                    ->visible(fn(Forms\Get $get) => $get('zone') === 'Otro Distrito'),
                Select::make('congregacion')
                    ->label('Congregación')
                    ->searchable()
                    ->options(function (Forms\Get $get) {
                        $zone = $get('zone');
                        $zonesData = self::getZonesData();
                        if ($zone && isset($zonesData[$zone])) {
                            $congregations = $zonesData[$zone];
                            return array_combine($congregations, $congregations);
                        }
                        return [];
                    })
                    ->visible(fn(Forms\Get $get) => $get('zone') !== 'Otro Distrito' && $get('zone') !== null)
                    ->required(fn(Forms\Get $get) => $get('zone') !== 'Otro Distrito' && $get('zone') !== null),
                TextInput::make('congregacion')
                    ->label('Congregación')
                    ->visible(fn(Forms\Get $get) => $get('zone') === 'Otro Distrito')
                    ->required(fn(Forms\Get $get) => $get('zone') === 'Otro Distrito'),
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
                Forms\Components\Textarea::make('notes')
                    ->label('Notas / Observaciones')
                    ->columnSpanFull(),
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
                TextColumn::make('created_at')
                    ->label('Fecha Registro')
                    ->dateTime('d/m/Y h:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nombres')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('last_name')
                    ->searchable()
                    ->label('Apellidos')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('document_number')
                    ->searchable()
                    ->label('Documento')
                    ->toggleable(),
                TextColumn::make('registration_type')
                    ->label('Plan')
                    ->badge()
                    ->colors([
                        'warning' => 'partial',
                        'success' => 'total',
                    ])
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'partial' => 'Parcial',
                        'total' => 'Total',
                        default => $state,
                    })
                    ->toggleable(),
                TextColumn::make('payment_status')
                    ->label('Estado Pago')
                    ->badge()
                    ->state(function (User $record) {
                        if ($record->balance <= 0)
                            return 'Paz y Salvo';
                        if ($record->total_paid > 0)
                            return 'Abonando';
                        return 'Sin Pagos';
                    })
                    ->colors([
                        'success' => 'Paz y Salvo',
                        'warning' => 'Abonando',
                        'danger' => 'Sin Pagos',
                    ])
                    ->toggleable(),
                TextColumn::make('age')
                    ->label('Edad')
                    ->badge()
                    ->color(fn(string $state): string => $state < 18 ? 'danger' : 'success')
                    ->formatStateUsing(fn(string $state) => $state . ($state < 18 ? ' (Menor)' : ''))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('zone')
                    ->sortable()
                    ->label('Zona')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('congregacion')
                    ->searchable()
                    ->label('Congregación')
                    ->toggleable(),
                TextColumn::make('total_paid')
                    ->label('Abonado')
                    ->money('COP')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('balance')
                    ->label('Pendiente')
                    ->money('COP')
                    ->sortable()
                    ->color(fn($state) => $state > 0 ? 'danger' : 'success')
                    ->toggleable(),
                // Extra columns hidden by default
                TextColumn::make('phone')
                    ->label('Celular')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')
                    ->label('Correo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('gender')
                    ->label('Sexo')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('eps')
                    ->label('EPS')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('coupon_code')
                    ->label('Cupón')
                    ->badge()
                    ->color('warning')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('zone')
                    ->options(function () {
                        $zones = array_keys(self::getZonesData());
                        return array_combine($zones, $zones);
                    })
                    ->searchable()
                    ->label('Zona'),
                SelectFilter::make('congregacion')
                    ->label('Congregación')
                    ->searchable()
                    ->options(function () {
                        $allCongregations = [];
                        foreach (self::getZonesData() as $zoneCongregations) {
                            foreach ($zoneCongregations as $congregation) {
                                $allCongregations[$congregation] = $congregation;
                            }
                        }
                        return $allCongregations;
                    }),
                SelectFilter::make('registration_type')
                    ->label('Tipo de Plan')
                    ->options([
                        'total' => 'Investidura Total',
                        'partial' => 'Estadía Parcial',
                    ]),
                SelectFilter::make('payment_status')
                    ->label('Estado de Pago')
                    ->options([
                        'paid' => 'Paz y Salvo (Pagado)',
                        'debt' => 'Con Deuda (Pendiente)',
                        'no_payment' => 'Sin Ningún Abono',
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when($data['value'], function (Builder $query, $value) {
                            match ($value) {
                                'paid' => $query->where('balance', '<=', 0),
                                'debt' => $query->where('balance', '>', 0),
                                'no_payment' => $query->doesntHave('payments'),
                            };
                        });
                    }),
                SelectFilter::make('document_type')
                    ->options([
                        'CC' => 'Cédula de Ciudadanía',
                        'TI' => 'Tarjeta de Identidad',
                        'PA' => 'Pasaporte',
                        'Otro' => 'Otro',
                    ])
                    ->label('Tipo de Documento'),
                SelectFilter::make('gender')
                    ->label('Sexo')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ]),
                Tables\Filters\Filter::make('minors')
                    ->label('Solo Menores de Edad')
                    ->query(fn(Builder $query): Builder => $query->where('age', '<', 18)),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Registrado desde'),
                        Forms\Components\DatePicker::make('created_until')->label('Registrado hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('download_ticket')
                        ->label('Descargar Ticket')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->url(fn(User $record): string => \Illuminate\Support\Facades\URL::signedRoute('ticket.show', ['user' => $record]))
                        ->openUrlInNewTab(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
                        TextEntry::make('notes')
                            ->label('Notas / Observaciones')
                            ->columnSpanFull()
                            ->markdown(),
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
                        TextEntry::make('discount_amount')->money('COP')->label('Descuento Aplicado')->color('warning'),
                        TextEntry::make('coupon_code')->label('Código Cupón')->badge()->color('warning'),
                        TextEntry::make('balance')->money('COP')->label('Saldo Pendiente')
                            ->color(fn($state) => $state > 0 ? 'danger' : 'success'),
                        TextEntry::make('target_cost')->money('COP')->label('Costo Total'),
                    ]),
                Section::make('Documentos de Soporte')
                    ->columns(2)
                    ->schema([
                        ImageEntry::make('consent_proof_path')
                            ->label('Consentimiento de Padres')
                            ->disk('public')
                            ->limit(1)

                            ->visible(fn($record) => $record->consent_proof_path !== null),
                        TextEntry::make('consent_download')
                            ->label('Descargar Consentimiento')
                            ->state('Descargar')
                            ->url(fn($record) => \Illuminate\Support\Facades\Storage::url($record->consent_proof_path))
                            ->openUrlInNewTab()
                            ->visible(fn($record) => $record->consent_proof_path !== null)
                            ->color('primary'),
                        ImageEntry::make('pastor_letter_path')
                            ->label('Carta Aval Pastoral')
                            ->disk('public')
                            ->limit(1)

                            ->visible(fn($record) => $record->pastor_letter_path !== null),
                        TextEntry::make('pastor_letter_download')
                            ->label('Descargar Carta')
                            ->state('Descargar')
                            ->url(fn($record) => \Illuminate\Support\Facades\Storage::url($record->pastor_letter_path))
                            ->openUrlInNewTab()
                            ->visible(fn($record) => $record->pastor_letter_path !== null)
                            ->color('primary'),
                    ]),
                Section::make('Ticket de Entrada')
                    ->columnSpanFull()
                    ->schema([
                        Infolists\Components\ViewEntry::make('ticket_preview')
                            ->view('filament.infolists.ticket-preview')
                            ->label('Vista Previa'),
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
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
