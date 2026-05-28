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
        Schema::create('childsubcategories', function (Blueprint $table) {
            $table->id();
            $table->string('categoryId');
            $table->string('subCategoryId');
            $table->string('name');
            $table->string('isDeleted', 1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childsubcategories');
    }
};
