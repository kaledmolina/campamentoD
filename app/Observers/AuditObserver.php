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
        // Only log if user is authenticated (admin panel actions)
        // Or strictly strictly if Auth::check(). 
        // Campers registering might trigger this too if we track User creation.
        // If we want to track WHO did it, we check Auth::id().
        // If it's a public registration, Auth::id() is null. We might want to record that too as 'System' or null.

        $userId = Auth::id();

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
