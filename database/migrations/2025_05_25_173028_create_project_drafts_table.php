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
        Schema::create('cp_project_drafts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('client_name', 100)->nullable();
            $table->text('project_location')->nullable();
            $table->decimal('cost_total', 15, 2)->default(0);
            $table->timestamps();
        });
        Schema::create('cp_project_draft_ahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ahs_id')->constrained('cp_ahs')->onDelete('cascade');
            $table->foreignId('project_draft_id')->constrained('cp_project_drafts')->onDelete('restrict');
            $table->decimal('volume', 12, 4)->default(0);
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_drafts');
    }
};
