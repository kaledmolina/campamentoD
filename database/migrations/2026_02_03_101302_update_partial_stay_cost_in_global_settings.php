<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \App\Models\GlobalSetting::updateOrCreate(
            ['key' => 'partial_stay_cost'],
            ['value' => 120000, 'label' => 'Costo Estadía Parcial']
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\GlobalSetting::where('key', 'partial_stay_cost')->update(['value' => 100000]);
    }
};
