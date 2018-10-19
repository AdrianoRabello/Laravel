<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            // faz referencia a chave estrangeira da tabela users ao campo id. Esse onDelete faz deletar o campo correspondente a chave
            // assim que deletamos ele na tabela
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('amount',10,2)->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
