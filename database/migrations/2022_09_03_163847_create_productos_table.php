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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('venta_id')->constrained()->onDelete('cascade');
            $table->string('nombre', 50);
            $table->string('referencia', 50);
            $table->integer('precio');
            $table->integer('peso');
            $table->string('categoria', 50);
            $table->integer('stock');
            $table->date('fecha');
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
};
