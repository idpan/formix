<?php
// database/migrations/2025_05_15_000003_create_rab_category_item_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estimate_category_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('estimate_categories')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('estimate_items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estimate_category_item');
    }
};
