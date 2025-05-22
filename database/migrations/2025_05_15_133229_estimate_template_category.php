<?php
// database/migrations/2025_05_15_000004_create_estimate_template_category_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estimate_template_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('estimate_templates')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('estimate_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estimate_template_category');
    }
};
