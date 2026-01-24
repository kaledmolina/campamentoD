<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Textarea;
use App\Filament\Resources\PaymentResource\Widgets\UserPaymentsHistory;

class ViewPayment extends ViewRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('approve')
                ->label('Aprobar')
                ->icon('heroicon-o-check')
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn($record) => $record->status === 'pending')
                ->action(function ($record) {
                    $record->update([
                        'status' => 'approved',
                        'reviewed_by' => auth()->id(),
                    ]);
                }),
            Actions\Action::make('reject')
                ->label('Rechazar')
                ->icon('heroicon-o-x-mark')
                ->color('danger')
                ->form([
                    Textarea::make('notes')->label('Motivo del rechazo')->required(),
                ])
                ->requiresConfirmation()
                ->visible(fn($record) => $record->status === 'pending')
                ->action(function ($record, array $data) {
                    $record->update([
                        'status' => 'rejected',
                        'reviewed_by' => auth()->id(),
                        'notes' => $data['notes'],
                    ]);
                }),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            UserPaymentsHistory::class,
        ];
    }
}
