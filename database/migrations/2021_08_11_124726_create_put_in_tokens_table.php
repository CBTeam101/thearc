<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePutInTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('put_in_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->foreignId('token_id');
            $table->foreignId('wallet_id');
            $table->foreignId('user_id');
            $table->decimal('tokens',9,2)->default(0);
            $table->decimal('current_price',9,2)->default(0);
            $table->decimal('shares', 9, 2)->default(0.00);
            $table->datetime('stop_at')->nullable();
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
        Schema::dropIfExists('put_in_tokens');
    }
}
