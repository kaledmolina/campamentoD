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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('type')->default('installment')->after('status');
        });

        // Backfill data: Assume existing payments with 'Inscripción' in notes are registrations
        \Illuminate\Support\Facades\DB::table('payments')
            ->where('notes', 'like', '%Inscripción%')
            ->update(['type' => 'registration']);

        // Fallback: If no notes, assume the FIRST payment for each user is the registration
        // (Simplified: We'll stick to notes for safety, or user can manual fix if needed)
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
