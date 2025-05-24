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
        Schema::create('cp_project_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('cp_ahs_project_template', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_template_id')->constrained('cp_project_templates')->onDelete('cascade');
            $table->foreignId('ahs_id')->constrained('cp_ahs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_template');
    }
};
