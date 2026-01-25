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
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() > 0 ? 'danger' : 'success';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('status', 'pending');
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
                TextColumn::make('user.target_cost')
                    ->money('COP')
                    ->label('Costo Total'),
                ImageColumn::make('proof_path')
                    ->label('Comprobante')
                    ->disk('public')
                    ->height(100)
                    ->openUrlInNewTab(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha Registro'),
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
