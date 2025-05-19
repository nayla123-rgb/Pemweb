<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penugasans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('supir_id')->constrained('supirs')->onDelete('cascade');

            $table->date('tanggal_penugasan');
            $table->string('rute');
            $table->string('kendaraan');
            $table->string('durasi');
            $table->enum('status', ['pending', 'selesai'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penugasans');
    }
};
