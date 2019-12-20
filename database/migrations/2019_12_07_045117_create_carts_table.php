<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('figure_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('figure_price');
            $table->integer('quantity')->nullable();
            $table->integer('transaction')->default(1);
            $table->bigInteger('price')->nullable();
            $table->string('status')->default('no');
            $table->foreign('figure_id')->references('id')->on('figures');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('carts');
    }
}
