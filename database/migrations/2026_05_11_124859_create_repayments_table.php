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
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();

            // relasi ke loans table
            $table->foreignId('loan_id')
                  ->constrained()
                  ->onDelete('cascade');

            // jumlah pembayaran
            $table->decimal('amount_paid', 15, 2);

            // tanggal pembayaran
            $table->date('payment_date');

            // metode pembayaran
            $table->string('payment_method')->nullable();
            $table->string('reference_number')->unique()->nullable();
$table->enum('status', ['pending', 'paid', 'failed'])
      ->default('paid');

            // catatan tambahan
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repayments');
    }
};