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
        Schema::create('riwayat__perjalanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perjalanan_id')->constrained('perjalanans')->onDelete('cascade');
            $table->enum('status', ['belum selesai', 'selesai']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat__perjalanans');
    }
};
