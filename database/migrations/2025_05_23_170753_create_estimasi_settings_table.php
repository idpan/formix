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
        Schema::create('estimasi_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harga_per_meter')->default(4450000);
            $table->boolean('aktif')->default(true);
            $table->string('form_header')->nullable();
            $table->text('catatan')->nullable();
            $table->text('pesan_template')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimasi_settings');
    }
};
