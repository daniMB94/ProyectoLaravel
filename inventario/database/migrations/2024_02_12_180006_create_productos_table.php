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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('modelo');
            $table->string('fabricante');
            $table->text('descripcion');
            $table->string('imagen');
            $table->double('stock');
            $table->enum('estado', ['activo', 'roto', 'desaparecido']);
            $table->unsignedBigInteger('localizacion_id')->nullable();
            $table->foreign('localizacion_id')->references('id')->on('localizacions')->onDelete('set null');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
