<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('plato_id');

            //anadiendo restriccion de llave foranea
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('plato_id')->references('id')->on('platos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
