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
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->unsignedBigInteger('anggota_id')->after('buku_id');
        
        // Tambahkan foreign key opsional
        $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->dropForeign(['anggota_id']);
        $table->dropColumn('anggota_id');
    });
}
};
