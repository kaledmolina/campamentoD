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

    public $selectedZone = '';

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

            // Encabezados detallados originales (26 columnas en total)
            fputcsv($handle, [
                'ID', 'Nombres', 'Apellidos', 'Email', 'Tipo Doc.', 'No. Documento',
                'Fecha Exp. Doc', 'Zona / Distrito', 'Congregación', 'Teléfono',
                'Edad', 'Género', 'Fecha Nacimiento', 'EPS', 'Tipo Inscripción',
                'Costo Base ($)', 'Cupón Aplicado', 'Descuento ($)', 'Costo Neto ($)',
                'Total Pagado ($)', 'Saldo Pendiente ($)', 'Tiene Carta Pastoral',
                'Tiene Permiso Menor', 'Notas / Observaciones', 'Fecha de Registro', 'Última Actualización'
            ], ';');

            // Obtener la configuración global una sola vez antes de procesar para evitar consultas N+1
            $defaultTotalCost = \App\Models\GlobalSetting::get('default_total_cost', 300000);

            // Procesar mediante cursores O(1) para garantizar cero desbordamiento de memoria RAM
            // Filtrar explícitamente por campistas (is_admin = false)
            foreach (User::where('is_admin', false)->with('payments')->orderBy('id', 'desc')->cursor() as $user) {
                // Cálculo de sumatorias y saldos completamente en memoria asegurando tipos numéricos (float)
                $partCost = is_numeric($user->participation_cost) ? (float) $user->participation_cost : null;
                $baseCost = $partCost !== null ? $partCost : (float) $defaultTotalCost;
                $discount = is_numeric($user->discount_amount) ? (float) $user->discount_amount : 0.0;
                $targetCost = $baseCost - $discount;
                $totalPaid = (float) $user->payments->where('status', 'approved')->sum('amount');
                $balance = $targetCost - $totalPaid;

                // Formateo robusto de fechas para evitar errores fatales si la base de datos devuelve strings
                $docIssueDate = $user->document_issue_date instanceof \DateTimeInterface 
                    ? $user->document_issue_date->format('Y-m-d') 
                    : ($user->document_issue_date ? (string) $user->document_issue_date : 'N/A');

                $birthDate = $user->birth_date instanceof \DateTimeInterface 
                    ? $user->birth_date->format('Y-m-d') 
                    : ($user->birth_date ? (string) $user->birth_date : 'N/A');

                $createdAt = $user->created_at instanceof \DateTimeInterface 
                    ? $user->created_at->format('Y-m-d H:i:s') 
                    : ($user->created_at ? (string) $user->created_at : 'N/A');

                $updatedAt = $user->updated_at instanceof \DateTimeInterface 
                    ? $user->updated_at->format('Y-m-d H:i:s') 
                    : ($user->updated_at ? (string) $user->updated_at : 'N/A');

                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->last_name,
                    $user->email,
                    $user->document_type,
                    $user->document_number,
                    $docIssueDate,
                    $user->zone,
                    $user->congregacion,
                    $user->phone,
                    $user->age,
                    $user->gender === 'M' ? 'Masculino' : ($user->gender === 'F' ? 'Femenino' : $user->gender),
                    $birthDate,
                    $user->eps,
                    $user->registration_type === 'total' ? 'Investidura Total' : 'Estadía Parcial',
                    number_format($baseCost, 2, ',', '.'),
                    $user->coupon_code ?? 'N/A',
                    number_format($discount, 2, ',', '.'),
                    number_format($targetCost, 2, ',', '.'),
                    number_format($totalPaid, 2, ',', '.'),
                    number_format($balance, 2, ',', '.'),
                    $user->pastor_letter_path ? 'SÍ (Adjunta)' : 'NO',
                    $user->consent_proof_path ? 'SÍ (Adjunto)' : 'NO',
                    $user->notes ?? 'N/A',
                    $createdAt,
                    $updatedAt
                ], ';');
            }

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

            // Procesar mediante cursores O(1) para optimizar memoria al máximo
            foreach (Payment::with(['user', 'reviewer'])->orderBy('id', 'desc')->cursor() as $payment) {
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

    public function getZones()
    {
        $dbZones = User::whereNotNull('zone')
            ->where('zone', '<>', '')
            ->distinct()
            ->orderBy('zone', 'asc')
            ->pluck('zone')
            ->toArray();

        if (empty($dbZones)) {
            return [
                'Zona Monteria',
                'Zona Alto San Jorge',
                'Zona Planeta Rica',
                'Zona La Mojana',
                'Zona Alto Sinu',
                'Zona Bajo Sinu',
                'Zona Medio Sinu',
                'Zona San Marcos',
                'Zona Sahagun',
                'Zona Franja del Mar',
            ];
        }

        return $dbZones;
    }

    public function exportReceiptsByZone()
    {
        if (empty($this->selectedZone)) {
            \Filament\Notifications\Notification::make()
                ->title('Debe seleccionar una zona')
                ->warning()
                ->send();
            return null;
        }

        try {
            $payments = Payment::whereHas('user', function ($query) {
                $query->where('zone', $this->selectedZone);
            })->whereNotNull('proof_path')
              ->where('proof_path', '<>', '')
              ->with('user')
              ->get();

            if ($payments->isEmpty()) {
                \Filament\Notifications\Notification::make()
                    ->title('No hay comprobantes')
                    ->body('No se encontraron comprobantes de pago subidos para la ' . $this->selectedZone)
                    ->warning()
                    ->send();
                return null;
            }

            // Asegurar que el directorio de reportes exista
            \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('reports');

            $zip = new \ZipArchive();
            $zipFileName = 'Comprobantes_' . str_replace(' ', '_', $this->selectedZone) . '_' . date('Y_m_d_His') . '.zip';
            $zipFilePath = storage_path('app/public/reports/' . $zipFileName);

            if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
                throw new \Exception("No se pudo crear el archivo ZIP temporal en la ruta: " . $zipFilePath);
            }

            $addedFiles = 0;
            foreach ($payments as $payment) {
                $path = $payment->proof_path;
                if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
                    $fileContent = \Illuminate\Support\Facades\Storage::disk('public')->get($path);
                    $extension = pathinfo($path, PATHINFO_EXTENSION);
                    
                    // Limpiar el nombre del campista para el nombre de archivo dentro del ZIP
                    $cleanFirstName = preg_replace('/[^A-Za-z0-9_\-]/', '', str_replace(' ', '_', $payment->user->name));
                    $cleanLastName = preg_replace('/[^A-Za-z0-9_\-]/', '', str_replace(' ', '_', $payment->user->last_name));
                    $fullName = $cleanFirstName . '_' . $cleanLastName;
                    
                    $zipEntryName = $payment->user->document_number . '_' . $fullName . '_Pago_' . $payment->id . '.' . $extension;
                    
                    $zip->addFromString($zipEntryName, $fileContent);
                    $addedFiles++;
                }
            }

            $zip->close();

            if ($addedFiles === 0) {
                if (file_exists($zipFilePath)) {
                    @unlink($zipFilePath);
                }
                \Filament\Notifications\Notification::make()
                    ->title('Archivos no encontrados')
                    ->body('Los registros existen en la base de datos, pero no se encontraron los archivos físicos en el servidor.')
                    ->danger()
                    ->send();
                return null;
            }

            return response()->download($zipFilePath)->deleteFileAfterSend(true);

        } catch (\Throwable $e) {
            \Filament\Notifications\Notification::make()
                ->title('Error al generar ZIP de Comprobantes')
                ->body($e->getMessage() . ' (Línea ' . $e->getLine() . ' en ' . basename($e->getFile()) . ')')
                ->danger()
                ->persistent()
                ->send();

            return null;
        }
    }
}
