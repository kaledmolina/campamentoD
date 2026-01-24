<?php

namespace App\Filament\Resources\PaymentResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Payment;
use Filament\Tables\Columns\TextColumn;

class UserPaymentsHistory extends BaseWidget
{
    public ?Payment $record = null;

    protected static ?string $heading = 'Historial de Abonos del Campista';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                function () {
                    if (!$this->record) {
                        return Payment::query()->whereNull('id');
                    }
                    return Payment::query()
                        ->where('user_id', $this->record->user_id)
                        ->where('id', '!=', $this->record->id)
                        ->latest();
                }
            )
            ->columns([
                TextColumn::make('amount')
                    ->money('COP')
                    ->label('Monto'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->label('Estado'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Fecha'),
                TextColumn::make('notes')
                    ->label('Notas')
                    ->limit(50),
            ]);
    }
}
