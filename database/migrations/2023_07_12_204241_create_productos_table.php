<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('precio');
            $table->unsignedBigInteger('categoriaid');
            $table->unsignedBigInteger('estadopromocionid');
            $table->string('Precio_promocion');

             //relacionando tablas  con productos
            $table->foreign('estadopromocionid')->references('id')->on('estadopromociones'); 
            $table->foreign('categoriaid')->references('id')->on('categorias');
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
        Schema::dropIfExists('productos');
    }
}
