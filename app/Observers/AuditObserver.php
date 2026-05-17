<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class AuditObserver
{
    /**
     * Handle the Model "created" event.
     */
    public function created(Model $model): void
    {
        $this->log($model, 'created', 'Creó un registro de ' . class_basename($model));
    }

    /**
     * Handle the Model "updated" event.
     */
    public function updated(Model $model): void
    {
        $this->log($model, 'updated', 'Actualizó un registro de ' . class_basename($model));
    }

    /**
     * Handle the Model "deleted" event.
     */
    public function deleted(Model $model): void
    {
        $this->log($model, 'deleted', 'Eliminó un registro de ' . class_basename($model));
    }

    protected function log(Model $model, string $action, string $description): void
    {
        // Verificar si hay un usuario autenticado y si realmente existe en la base de datos.
        // Auth::id() puede devolver un ID de una sesión obsoleta (ej. tras un reset de BD),
        // mientras que Auth::user() realiza la consulta y devuelve null si el registro fue eliminado.
        $user = Auth::user();
        $userId = $user ? $user->id : null;

        // Si no hay un usuario logueado válido (ej. registro público de campista) y estamos creando un User,
        // atribuimos la acción al propio usuario que se acaba de crear.
        if (!$userId && $model instanceof \App\Models\User && $action === 'created') {
            $userId = $model->id;
        }

        // Si se está creando un abono/pago desde el portal público sin autenticación,
        // asociamos el registro de actividad al campista dueño del pago.
        if (!$userId && $model instanceof \App\Models\Payment && $action === 'created') {
            $userId = $model->user_id;
        }

        ActivityLog::create([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
            'subject_type' => get_class($model),
            'subject_id' => $model->id,
            'ip_address' => request()->ip(),
        ]);
    }
}
