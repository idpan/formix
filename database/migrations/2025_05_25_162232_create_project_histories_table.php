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
        Schema::create('cp_project_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('client_name', 100)->nullable();
            $table->text('project_location')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // FK ke users opsional
            $table->decimal('cost_total', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_histories');
    }
};
