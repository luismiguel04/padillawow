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
        Schema::create('pagos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provedor_id');
            $table->unsignedBigInteger('cuenta_id');
            $table->date('fecha');
            $table->string('referencia', 20);
            $table->string('cliente', 100);
            $table->string('concepto', 100);
            $table->string('bl', 20);
            $table->string('contenedor', 20);
            $table->string('factura', 15);
            $table->double('cantidad', 16, 2);
            $table->string('moneda', 10);
            $table->string('obeservacion', 100);
            $table->string('obeservacionderev', 100);

            $table->enum("status", ["pendiente", "revisado", "pagado", "eliminado"]);
            $table->foreign('provedor_id')->references('id')->on('provedors')->onDelete("cascade");
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete("cascade");
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