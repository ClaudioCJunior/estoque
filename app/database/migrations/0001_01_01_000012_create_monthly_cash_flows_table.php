<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyCashFlowsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monthly_cash_flows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('establishment_id')->constrained('establishments'); 
            $table->string('month_year', 7)->unique(); 
            $table->integer('total_sales');
            $table->decimal('sales_value', 10, 2);
            $table->integer('total_discounts');
            $table->decimal('total_product_entries_value', 10, 2);
            $table->decimal('total_value_with_discounts_and_entries', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_cash_flows');
    }
}