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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('celular')->nullable();
            $table->unsignedBigInteger('rol_id');
            $table->boolean('estado')->default(true);
            //añadiendo restriccion de clave foranea
            $table->foreign('rol_id')->references('id')->on('rols')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
