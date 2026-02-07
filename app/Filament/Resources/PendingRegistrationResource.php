<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendingRegistrationResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

class PendingRegistrationResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationLabel = 'Inscripciones Pendientes';

    protected static ?string $modelLabel = 'Inscripción Pendiente';

    protected static ?string $pluralModelLabel = 'Inscripciones Pendientes';

    protected static ?int $navigationSort = 1; // Show near top

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->where('type', 'registration')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'pending')->where('type', 'registration')->count() > 0 ? 'danger' : 'success';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('status', 'pending')
            ->where('type', 'registration');
    }

    public static function form(Form $form): Form
    {
        return PaymentResource::form($form); // Reuse existing payment form
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
                    ->label('Monto Abono'),

                ImageColumn::make('proof_path')
                    ->label('Comprobante')
                    ->disk('public')
                    ->height(100)
                    ->openUrlInNewTab(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha Registro'),
                TextColumn::make('user.coupon_code')
                    ->label('Cupón')
                    ->badge()
                    ->color('warning')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('user.target_cost')
                    ->money('COP')
                    ->label('Costo Total')
                    ->sortable()
                    ->description(fn(Payment $record) => $record->user->discount_amount > 0 ? 'Descuento aplicado: $' . number_format($record->user->discount_amount) : null)
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                Action::make('approve')
                    ->label('Aprobar')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
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
                        Forms\Components\Textarea::make('notes')->label('Motivo del rechazo')->required(),
                    ])
                    ->requiresConfirmation()
                    ->action(function (Payment $record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'reviewed_by' => Auth::id(),
                            'notes' => $data['notes'],
                        ]);
                    }),
            ])
            ->bulkActions([
                // No bulk delete for approvals usually
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Detalles del Abono')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('user.name')->label('Campista'),
                        \Filament\Infolists\Components\TextEntry::make('amount')->money('COP')->label('Monto'),
                        \Filament\Infolists\Components\TextEntry::make('status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'pending' => 'warning',
                                'approved' => 'success',
                                'rejected' => 'danger',
                            })
                            ->label('Estado'),
                        \Filament\Infolists\Components\TextEntry::make('created_at')->dateTime()->label('Fecha'),
                        \Filament\Infolists\Components\ImageEntry::make('proof_path')
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
                        \Filament\Infolists\Components\TextEntry::make('notes')->label('Notas')->columnSpanFull(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Estado de Cuenta del Campista')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('user.total_paid')
                            ->money('COP')
                            ->label('Total Pagado (Aprobado)'),
                        \Filament\Infolists\Components\TextEntry::make('user.balance')
                            ->money('COP')
                            ->label('Saldo Pendiente')
                            ->color(fn($state) => $state > 0 ? 'danger' : 'success'),
                        \Filament\Infolists\Components\TextEntry::make('user.target_cost')
                            ->money('COP')
                            ->label('Costo Total'),
                    ])->columns(3),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendingRegistrations::route('/'),
            'view' => Pages\ViewPendingRegistration::route('/{record}'),
        ];
    }
}
