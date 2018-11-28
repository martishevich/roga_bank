<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_number');
            $table->tinyInteger('CSC');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('expiration_date');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('logins');
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
        Schema::dropIfExists('account_cards');
    }
}
