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
        try {
            // 1. Asegurar que el directorio exista
            \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('reports');

            $fileName = 'Reporte_Campistas_Detallado_' . date('Y_m_d_His') . '.csv';
            $filePath = storage_path('app/public/reports/' . $fileName);

            $handle = fopen($filePath, 'w');
            if (!$handle) {
                throw new \Exception("No se pudo abrir el archivo para escritura en: " . $filePath);
            }
            
            // Agregar BOM UTF-8 para que Excel reconozca tildes y caracteres especiales nativamente
            fwrite($handle, "\xEF\xBB\xBF");

            // Encabezados limpios y optimizados solicitados por el usuario
            fputcsv($handle, [
                'ID', 'Nombre Completo', 'Tipo Doc.', 'No. Documento',
                'Zona / Distrito', 'Congregación', 'Teléfono', 'Email',
                'Edad', 'Género', 'EPS', 'Total Abonado ($)'
            ], ';');

            // Procesar en lotes (chunking) para evitar que PHP exceda el memory_limit al cargar todos los usuarios
            User::with('payments')->orderBy('id', 'desc')->chunk(100, function ($users) use ($handle) {
                foreach ($users as $user) {
                    // Cálculo sumatorio del total abonado (pagos aprobados)
                    $totalPaid = (float) $user->payments->where('status', 'approved')->sum('amount');

                    fputcsv($handle, [
                        $user->id,
                        trim($user->name . ' ' . $user->last_name),
                        $user->document_type,
                        $user->document_number,
                        $user->zone,
                        $user->congregacion,
                        $user->phone,
                        $user->email,
                        $user->age,
                        $user->gender === 'M' ? 'Masculino' : ($user->gender === 'F' ? 'Femenino' : $user->gender),
                        $user->eps,
                        number_format($totalPaid, 2, ',', '.')
                    ], ';');
                }
            });

            fclose($handle);

            return response()->download($filePath);

        } catch (\Throwable $e) {
            \Filament\Notifications\Notification::make()
                ->title('Error al generar Reporte de Campistas')
                ->body($e->getMessage() . ' (Línea ' . $e->getLine() . ' en ' . basename($e->getFile()) . ')')
                ->danger()
                ->persistent()
                ->send();

            return null;
        }
    }

    public function exportPayments()
    {
        try {
            // 1. Asegurar que el directorio exista
            \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('reports');

            $fileName = 'Reporte_Abonos_Pagos_Detallado_' . date('Y_m_d_His') . '.csv';
            $filePath = storage_path('app/public/reports/' . $fileName);

            $handle = fopen($filePath, 'w');
            if (!$handle) {
                throw new \Exception("No se pudo abrir el archivo para escritura en: " . $filePath);
            }
            
            // Agregar BOM UTF-8
            fwrite($handle, "\xEF\xBB\xBF");

            // Encabezados detallados
            fputcsv($handle, [
                'ID Pago', 'ID Campista', 'No. Documento Campista', 'Nombre del Campista',
                'Zona / Distrito', 'Congregación', 'Monto del Abono ($)', 'Estado del Pago',
                'Tipo de Transacción', 'Revisado Por (Admin)', 'Notas / Comentarios',
                'Ruta del Comprobante', 'Fecha de Registro del Pago', 'Fecha de Última Revisión'
            ], ';');

            // Cargar abonos en lotes (chunking) para optimizar memoria
            Payment::with(['user', 'reviewer'])->orderBy('id', 'desc')->chunk(100, function ($payments) use ($handle) {
                foreach ($payments as $payment) {
                    $camper = $payment->user;
                    $reviewer = $payment->reviewer;

                    $createdAt = $payment->created_at instanceof \DateTimeInterface 
                        ? $payment->created_at->format('Y-m-d H:i:s') 
                        : ($payment->created_at ? (string) $payment->created_at : 'N/A');

                    $updatedAt = $payment->updated_at instanceof \DateTimeInterface 
                        ? $payment->updated_at->format('Y-m-d H:i:s') 
                        : ($payment->updated_at ? (string) $payment->updated_at : 'N/A');

                    fputcsv($handle, [
                        $payment->id,
                        $camper ? $camper->id : 'N/A',
                        $camper ? $camper->document_number : 'N/A',
                        $camper ? ($camper->name . ' ' . $camper->last_name) : 'Usuario Eliminado',
                        $camper ? $camper->zone : 'N/A',
                        $camper ? $camper->congregacion : 'N/A',
                        number_format((float) $payment->amount, 2, ',', '.'),
                        strtoupper($payment->status),
                        strtoupper($payment->type),
                        $reviewer ? ($reviewer->name . ' ' . $reviewer->last_name) : 'N/A',
                        $payment->notes ?? 'N/A',
                        $payment->proof_path ?? 'N/A',
                        $createdAt,
                        $updatedAt
                    ], ';');
                }
            });

            fclose($handle);

            return response()->download($filePath);

        } catch (\Throwable $e) {
            \Filament\Notifications\Notification::make()
                ->title('Error al generar Reporte de Abonos')
                ->body($e->getMessage() . ' (Línea ' . $e->getLine() . ' en ' . basename($e->getFile()) . ')')
                ->danger()
                ->persistent()
                ->send();

            return null;
        }
    }
}
