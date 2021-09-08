<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id');
            $table->foreignId('recipient_id');
            $table->foreignId('token_id');
            $table->decimal('token', 9, 2)->default(0);
            $table->decimal('current_price', 9, 2)->default(0);
            $table->decimal('ask_price', 9, 2)->default(0);
            $table->foreignId('status_id');
            $table->string('description');
            $table->datetime('approved_at')->nullable();
            $table->foreignId('payment_method');
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
        Schema::dropIfExists('sell_tokens');
    }
}
