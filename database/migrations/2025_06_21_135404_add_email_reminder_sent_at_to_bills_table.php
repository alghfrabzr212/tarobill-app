<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bills', function (Blueprint $table) {
            // Tambahkan kolom baru. 'nullable()' penting karena awalnya kosong
            // 'after("status")' agar posisinya di setelah kolom 'status' (opsional)
            $table->timestamp('email_reminder_sent_at')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('bills', function (Blueprint $table) {
            // Saat rollback, kolom ini akan dihapus
            $table->dropColumn('email_reminder_sent_at');
        });
    }
};