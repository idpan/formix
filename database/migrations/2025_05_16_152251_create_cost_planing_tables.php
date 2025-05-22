<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. est_ahs_groups
        Schema::create('cp_ahs_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });

        // 2. est_items
        Schema::create('cp_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('unit', 10);
            $table->decimal('unit_price', 15, 2)->default(0);
            $table->enum('category', ['material', 'labor', 'equipment']);
            $table->timestamps();
        });

        // 3. est_ahs
        Schema::create('cp_ahs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('unit', 10);
            $table->foreignId('ahs_group_id')->constrained('cp_ahs_groups')->onDelete('cascade');
            $table->timestamps();
        });

        // 4. est_ahs_details
        Schema::create('cp_ahs_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ahs_id')->constrained('cp_ahs')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('cp_items')->onDelete('restrict');
            $table->decimal('coefficient', 10, 4)->default(1);
            $table->timestamps();
        });

        // 5. est_projects
        Schema::create('cp_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('client_name', 100)->nullable();
            $table->text('project_location')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // FK ke users opsional
            $table->timestamps();
        });

        // 6. est_project_works
        Schema::create('cp_project_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('cp_projects')->onDelete('cascade');
            $table->string('ahs_name', 100);
            $table->string('unit', 10);
            $table->decimal('volume', 12, 4)->default(0);
            $table->decimal('unit_price', 15, 2)->default(0);
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->timestamps();
        });

        // 7. est_project_work_items
        Schema::create('cp_project_work_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_work_id')->constrained('cp_project_works')->onDelete('cascade');
            $table->string('item_name', 100);
            $table->string('unit', 10);
            $table->decimal('unit_price', 15, 2)->default(0);
            $table->decimal('coefficient', 10, 4)->default(1);
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->enum('category', ['material', 'labor', 'equipment']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cp_project_work_items');
        Schema::dropIfExists('cp_project_works');
        Schema::dropIfExists('cp_projects');
        Schema::dropIfExists('cp_ahs_details');
        Schema::dropIfExists('cp_ahs');
        Schema::dropIfExists('cp_items');
        Schema::dropIfExists('cp_ahs_groups');
    }
};
