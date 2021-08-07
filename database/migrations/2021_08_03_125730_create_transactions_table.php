<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tr_no')->unique();
            $table->foreignId('user_wallet_id');
            $table->foreignId('user_id');
            $table->foreignId('token_id');
            $table->foreignId('transaction_type_id');
            $table->foreignId('status_id');
            $table->decimal('amount', 9, 2)->default(0);
            $table->decimal('token', 9, 2)->default(0);
            $table->decimal('current_price', 9, 2)->nullable();
            $table->string('uuid')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
