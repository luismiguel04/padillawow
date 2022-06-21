<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cuentas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('provedor_id')->unsigned();
            $table->string('banco', 100);
            $table->string('sucursal', 100);
            $table->string('direccion', 500);
            $table->string('cuenta', 20);
            $table->string('clave', 18);
            $table->string('swifts');
            $table->string('aba');
            $table->string('moneda');
            $table->string('observaciones', 100);
            $table->enum("status", ["activa", "inactiva"]);
            $table->foreign('provedor_id')->references('id')->on('provedors')->onDelete("cascade");
            $table->foreign('user_id')->references('user_id')->on('provedors')->onDelete("cascade");
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
        //
    }
};