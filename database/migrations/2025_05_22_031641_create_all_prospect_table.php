<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pt_prospects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->decimal('estimated_value', 15, 2)->nullable();
            $table->enum('status', ['New', 'Warm', 'Cold', 'Deal', 'Lost'])->default('Warm');
            $table->timestamps();
        });

        Schema::create('pt_prospect_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prospect_id')->constrained('pt_prospects')->onDelete('cascade');
            $table->foreignId('noted_by')->constrained('users');
            $table->text('note');
            $table->enum('status_at_time', ['Hot', 'Warm', 'Cold', 'Deal', 'Lost'])->nullable();
            $table->string('next_action', 255)->nullable();
            $table->timestamp('note_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pt_prospect_notes');
        Schema::dropIfExists('pt_prospects');
    }
};
