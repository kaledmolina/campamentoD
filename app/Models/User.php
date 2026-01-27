<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'document_type',
        'document_number',
        'document_issue_date',
        'zone',
        'congregacion',
        'phone',
        'age',
        'gender',
        'birth_date',
        'eps',
        'is_admin',
        'consent_proof_path',
        'participation_cost',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getTotalPaidAttribute()
    {
        return $this->payments()->where('status', 'approved')->sum('amount');
    }

    public function getTargetCostAttribute()
    {
        // Return personal cost override if set, otherwise global default
        if ($this->participation_cost !== null) {
            return $this->participation_cost;
        }

        return GlobalSetting::get('default_total_cost', 300000);
    }

    public function getBalanceAttribute()
    {
        return $this->target_cost - $this->total_paid;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'document_issue_date' => 'date',
            'birth_date' => 'date',
        ];
    }
}
