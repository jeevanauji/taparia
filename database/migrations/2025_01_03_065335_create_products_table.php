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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('categoryId');
            $table->string('subCategoryId')->nullable();            
            $table->string('childSubCategoryId')->nullable();            
            $table->string('productName');
            $table->string('productCatalogue')->nullable();
            $table->longText('productOverview')->nullable();
            $table->longText('productHighlighting')->nullable();
            $table->longText('productSpecifications')->nullable();            
            $table->string('isDeleted', 1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
