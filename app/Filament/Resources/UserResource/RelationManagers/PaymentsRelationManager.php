<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('amount')
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->label('Monto')
                    ->money('COP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->label('Estado'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->colors([
                        'primary' => 'registration',
                        'gray' => 'abono',
                    ])
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'registration' => 'Inscripción',
                        'abono' => 'Abono',
                        default => $state,
                    })
                    ->visibleFrom('md')
                    ->toggleable(),
                Tables\Columns\ImageColumn::make('proof_path')
                    ->label('Comprobante')
                    ->disk('public')
                    ->visibility('private')
                    ->visibleFrom('md')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Fecha')
                    ->sortable()
                    ->visibleFrom('md')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('notes')
                    ->label('Notas')
                    ->limit(30)
                    ->visibleFrom('md')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('download')
                        ->label('Descargar Comprobante')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('primary')
                        ->action(fn($record) => \Illuminate\Support\Facades\Storage::disk('public')->download($record->proof_path)),
                    Tables\Actions\Action::make('approve')
                        ->label('Aprobar')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('¿Aprobar Abono?')
                        ->modalDescription('¿Está seguro de que desea aprobar este abono? El monto se reflejará en el saldo pagado por el campista.')
                        ->modalSubmitActionLabel('Sí, aprobar')
                        ->visible(fn($record) => $record->status === 'pending')
                        ->action(function ($record) {
                            $record->update([
                                'status' => 'approved',
                                'reviewed_by' => auth()->id(),
                            ]);
                        }),
                    Tables\Actions\Action::make('reject')
                        ->label('Rechazar')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('¿Rechazar Abono?')
                        ->modalDescription('Por favor, indique el motivo por el cual rechaza este abono. El campista podrá ver esta nota.')
                        ->modalSubmitActionLabel('Sí, rechazar')
                        ->form([
                            Forms\Components\Textarea::make('notes')->label('Motivo del rechazo')->required(),
                        ])
                        ->visible(fn($record) => $record->status === 'pending')
                        ->action(function ($record, array $data) {
                            $record->update([
                                'status' => 'rejected',
                                'reviewed_by' => auth()->id(),
                                'notes' => $data['notes'],
                            ]);
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
