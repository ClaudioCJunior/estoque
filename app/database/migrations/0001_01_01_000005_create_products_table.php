<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('establishment_id')->constrained('establishments');
            $table->foreignId('product_type_id')->constrained('product_types');
            $table->foreignId('product_subtype_id')->nullable()->constrained('product_subtypes'); 
            $table->string('name', 255);
            $table->text('description');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('unit_price_invested', 10, 2);
            $table->integer('stock_quantity');
            $table->boolean('current')->default(true); 
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
}