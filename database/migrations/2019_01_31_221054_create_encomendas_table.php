<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncomendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formaDePagamento');
            $table->integer('idCliente')->nullable()->unsigned();
            $table->integer('idProduto')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('encomendas', function (Blueprint $table) {
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('set null');
        });

        Schema::table('encomendas', function(Blueprint $table) {
            $table->foreign('idProduto')->references('id')->on('produtos')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encomendas');
    }
}
