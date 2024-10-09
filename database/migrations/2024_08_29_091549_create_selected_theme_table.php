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
        Schema::create('selected_theme', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('themeId');
            $table->unsignedInteger('packageId');
            $table->unsignedInteger('subCategoryId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selected_theme');
    }
};