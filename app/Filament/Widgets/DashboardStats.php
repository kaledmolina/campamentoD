<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Count only campers (non-admins)
        $totalCampers = User::where('is_admin', false)->count();

        // Count collected capital ONLY from campers
        $totalCapitalCollected = Payment::whereHas('user', function ($query) {
            $query->where('is_admin', false);
        })->where('status', 'approved')->sum('amount');

        $totalExpectedAmount = $totalCampers * 300000;
        $totalPendingCollection = $totalExpectedAmount - $totalCapitalCollected;

        // Calculate counts of campers with debt
        // Use PHP filtering for simplicity assuming reasonable dataset size
        // This avoids complex SQL for the computed 'total_paid' attribute logic
        $campersWithDebt = User::where('is_admin', false)->get()->filter(function ($user) {
            return $user->balance > 0;
        })->count();

        return [
            Stat::make('Campistas Inscritos', $totalCampers)
                ->description('Total de registros')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Campistas con Deuda', $campersWithDebt)
                ->description('Pendientes por pagar total')
                ->descriptionIcon('heroicon-m-user-minus')
                ->color('danger'),

            Stat::make('Capital Recaudado', '$' . number_format($totalCapitalCollected, 0))
                ->description('Pagos aprobados en fondo')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Pendiente por Recaudar', '$' . number_format($totalPendingCollection, 0))
                ->description('Capital faltante segun inscritos')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}
