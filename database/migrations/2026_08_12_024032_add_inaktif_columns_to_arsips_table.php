<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('arsips', function (Blueprint $table) {
        if (!Schema::hasColumn('arsips', 'status')) {
            $table->string('status')->default('aktif')->after('jumlah');
        }
        if (!Schema::hasColumn('arsips', 'kurun_waktu')) {
            $table->string('kurun_waktu')->nullable()->after('status');
        }
        if (!Schema::hasColumn('arsips', 'tingkat_perkembangan')) {
            $table->string('tingkat_perkembangan')->default('Asli')->after('kurun_waktu');
        }
    });
}
    
    public function down(): void
    {
        Schema::table('arsips', function (Blueprint $table) {
            $table->dropColumn(['status', 'kurun_waktu', 'tingkat_perkembangan']);
        });
    }
};
