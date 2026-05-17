<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Response;

class ExcelReports extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $navigationGroup = 'Reportes y Exportaciones';
    protected static ?string $navigationLabel = 'Reportes Excel';
    protected static ?string $title = 'Descarga de Reportes en Excel';

    protected static string $view = 'filament.pages.excel-reports';

    public function exportCampers()
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            
            // Agregar BOM UTF-8 para que Excel reconozca tildes y caracteres especiales nativamente
            fwrite($handle, "\xEF\xBB\xBF");

            // Encabezados detallados
            fputcsv($handle, [
                'ID', 'Nombres', 'Apellidos', 'Email', 'Tipo Doc.', 'No. Documento',
                'Fecha Exp. Doc', 'Zona / Distrito', 'Congregación', 'Teléfono',
                'Edad', 'Género', 'Fecha Nacimiento', 'EPS', 'Tipo Inscripción',
                'Costo Base ($)', 'Cupón Aplicado', 'Descuento ($)', 'Costo Neto ($)',
                'Total Pagado ($)', 'Saldo Pendiente ($)', 'Tiene Carta Pastoral',
                'Tiene Permiso Menor', 'Notas / Observaciones', 'Fecha de Registro', 'Última Actualización'
            ], ';');

            // 1. Obtener la configuración global una sola vez antes de procesar para evitar consultas N+1
            $defaultTotalCost = \App\Models\GlobalSetting::get('default_total_cost', 300000);

            // 2. Cargar todos los usuarios con sus pagos en memoria mediante get() para un flujo continuo sin pausas de búfer en Livewire AJAX
            $users = User::with('payments')->orderBy('id', 'desc')->get();

            foreach ($users as $user) {
                // Cálculo de sumatorias y saldos completamente en memoria sin tocar la base de datos
                $baseCost = $user->participation_cost !== null ? $user->participation_cost : $defaultTotalCost;
                $targetCost = $baseCost - ($user->discount_amount ?? 0);
                $totalPaid = $user->payments->where('status', 'approved')->sum('amount');
                $balance = $targetCost - $totalPaid;

                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->last_name,
                    $user->email,
                    $user->document_type,
                    $user->document_number,
                    $user->document_issue_date ? $user->document_issue_date->format('Y-m-d') : 'N/A',
                    $user->zone,
                    $user->congregacion,
                    $user->phone,
                    $user->age,
                    $user->gender === 'M' ? 'Masculino' : ($user->gender === 'F' ? 'Femenino' : $user->gender),
                    $user->birth_date ? $user->birth_date->format('Y-m-d') : 'N/A',
                    $user->eps,
                    $user->registration_type === 'total' ? 'Investidura Total' : 'Estadía Parcial',
                    number_format($baseCost, 2, ',', '.'),
                    $user->coupon_code ?? 'N/A',
                    number_format($user->discount_amount ?? 0, 2, ',', '.'),
                    number_format($targetCost, 2, ',', '.'),
                    number_format($totalPaid, 2, ',', '.'),
                    number_format($balance, 2, ',', '.'),
                    $user->pastor_letter_path ? 'SÍ (Adjunta)' : 'NO',
                    $user->consent_proof_path ? 'SÍ (Adjunto)' : 'NO',
                    $user->notes ?? 'N/A',
                    $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : 'N/A',
                    $user->updated_at ? $user->updated_at->format('Y-m-d H:i:s') : 'N/A'
                ], ';');
            }

            fclose($handle);
        }, 'Reporte_Campistas_Detallado_' . date('Y_m_d_His') . '.csv');
    }

    public function exportPayments()
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            
            // Agregar BOM UTF-8
            fwrite($handle, "\xEF\xBB\xBF");

            // Encabezados detallados
            fputcsv($handle, [
                'ID Pago', 'ID Campista', 'No. Documento Campista', 'Nombre del Campista',
                'Zona / Distrito', 'Congregación', 'Monto del Abono ($)', 'Estado del Pago',
                'Tipo de Transacción', 'Revisado Por (Admin)', 'Notas / Comentarios',
                'Ruta del Comprobante', 'Fecha de Registro del Pago', 'Fecha de Última Revisión'
            ], ';');

            // Cargar abonos con sus relaciones mediante get() para un flujo continuo sin pausas de búfer en Livewire AJAX
            $payments = Payment::with(['user', 'reviewer'])->orderBy('id', 'desc')->get();

            foreach ($payments as $payment) {
                $camper = $payment->user;
                $reviewer = $payment->reviewer;

                fputcsv($handle, [
                    $payment->id,
                    $camper ? $camper->id : 'N/A',
                    $camper ? $camper->document_number : 'N/A',
                    $camper ? ($camper->name . ' ' . $camper->last_name) : 'Usuario Eliminado',
                    $camper ? $camper->zone : 'N/A',
                    $camper ? $camper->congregacion : 'N/A',
                    number_format($payment->amount, 2, ',', '.'),
                    strtoupper($payment->status),
                    strtoupper($payment->type),
                    $reviewer ? ($reviewer->name . ' ' . $reviewer->last_name) : 'N/A',
                    $payment->notes ?? 'N/A',
                    $payment->proof_path ?? 'N/A',
                    $payment->created_at ? $payment->created_at->format('Y-m-d H:i:s') : 'N/A',
                    $payment->updated_at ? $payment->updated_at->format('Y-m-d H:i:s') : 'N/A'
                ], ';');
            }

            fclose($handle);
        }, 'Reporte_Abonos_Pagos_Detallado_' . date('Y_m_d_His') . '.csv');
    }
}
