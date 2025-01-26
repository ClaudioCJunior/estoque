<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('establishment_id')->constrained('establishments');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('client_id')->constrained('establishment_clients');
            $table->foreignId('discount_id')->nullable()->constrained('discounts'); // Adiciona a chave estrangeira para discounts
            $table->foreignId('cash_register_id')->nullable()->constrained('cash_registers')->onDelete('set null');
            $table->decimal('total', 10, 2);
            $table->enum('payment_method', ['cartão', 'pix', 'dinheiro']);
            $table->enum('payment_status', ['aprovado', 'falha', 'pendente'])->default('pendente'); // Define pendente como valor padrão
            $table->string('transaction_code', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['discount_id']);
            $table->dropColumn('discount_id');
        });
    }
}