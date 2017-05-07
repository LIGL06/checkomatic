<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
          //Banco,Folio,Beneficiario,Cantidad,Fecha de Vencimiento
            $table->increments('id');
            $table->string('bank');
            $table->integer('folio');
            $table->string('recipient');
            $table->decimal('amount',12,2);
            $table->date('validUntil');
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
        Schema::dropIfExists('checks');
    }
}
