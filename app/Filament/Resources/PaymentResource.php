<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Abonos';

    protected static ?string $modelLabel = 'Abono';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->where('type', 'installment')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'pending')->where('type', 'installment')->count() > 0 ? 'warning' : 'gray';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required()
                    ->label('Campista'),
                TextInput::make('amount')
                    ->numeric()
                    ->required()
                    ->prefix('$')
                    ->label('Monto'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pendiente',
                        'approved' => 'Aprobado',
                        'rejected' => 'Rechazado',
                    ])
                    ->required()
                    ->label('Estado'),
                FileUpload::make('proof_path')
                    ->image()
                    ->directory('payments')
                    ->required()
                    ->label('Comprobante'),
                Textarea::make('notes')
                    ->label('Notas'),
                \Filament\Forms\Components\Hidden::make('type')
                    ->default('installment'),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('user', function (Builder $query) {
            $query->where('is_admin', false);
        });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label('Campista'),
                TextColumn::make('user.document_number')
                    ->searchable()
                    ->label('Documento'),
                TextColumn::make('amount')
                    ->money('COP')
                    ->sortable()
                    ->label('Monto'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->label('Estado'),
                ImageColumn::make('proof_path')
                    ->label('Comprobante')
                    ->disk('public')
                    ->openUrlInNewTab(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pendiente',
                        'approved' => 'Aprobado',
                        'rejected' => 'Rechazado',
                    ])
                    ->label('Estado'),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Desde'),
                        Forms\Components\DatePicker::make('created_until')->label('Hasta'),
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
                    ->label('Fecha de Abono'),
                Tables\Filters\SelectFilter::make('user_zone')
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
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['value'],
                            fn(Builder $query, $value): Builder => $query->whereHas('user', fn(Builder $query) => $query->where('zone', $value))
                        );
                    })
                    ->label('Zona del Campista')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('approve')
                    ->label('Aprobar')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn(Payment $record) => $record->status === 'pending')
                    ->action(function (Payment $record) {
                        $record->update([
                            'status' => 'approved',
                            'reviewed_by' => Auth::id(),
                        ]);
                    }),
                Action::make('reject')
                    ->label('Rechazar')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->form([
                        Textarea::make('notes')->label('Motivo del rechazo')->required(),
                    ])
                    ->requiresConfirmation()
                    ->visible(fn(Payment $record) => $record->status === 'pending')
                    ->action(function (Payment $record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'reviewed_by' => Auth::id(),
                            'notes' => $data['notes'],
                        ]);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(fn(Payment $record): string => PaymentResource::getUrl('view', ['record' => $record]));
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detalles del Abono')
                    ->schema([
                        TextEntry::make('user.name')->label('Campista'),
                        TextEntry::make('amount')->money('COP')->label('Monto'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'pending' => 'warning',
                                'approved' => 'success',
                                'rejected' => 'danger',
                            })
                            ->label('Estado'),
                        TextEntry::make('created_at')->dateTime()->label('Fecha'),
                        ImageEntry::make('proof_path')
                            ->label('Comprobante')
                            ->columnSpanFull()
                            ->url(fn($record) => \Illuminate\Support\Facades\Storage::disk('public')->url($record->proof_path))
                            ->openUrlInNewTab(),
                        \Filament\Infolists\Components\Actions::make([
                            \Filament\Infolists\Components\Actions\Action::make('download')
                                ->label('Descargar Comprobante')
                                ->icon('heroicon-o-arrow-down-tray')
                                ->color('primary')
                                ->url(fn($record) => \Illuminate\Support\Facades\Storage::disk('public')->url($record->proof_path))
                                ->openUrlInNewTab(),
                        ])->columnSpanFull(),
                        TextEntry::make('notes')->label('Notas')->columnSpanFull(),
                    ])->columns(2),
                Section::make('Estado de Cuenta del Campista')
                    ->schema([
                        TextEntry::make('user.total_paid')
                            ->money('COP')
                            ->label('Total Pagado (Aprobado)'),
                        TextEntry::make('user.balance')
                            ->money('COP')
                            ->label('Saldo Pendiente')
                            ->color(fn($state) => $state > 0 ? 'danger' : 'success'),
                        TextEntry::make('user.target_cost')
                            ->money('COP')
                            ->label('Costo Total'),
                    ])->columns(3),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'view' => Pages\ViewPayment::route('/{record}'),
        ];
    }
}
