<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string("dni", 15);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('sexo', 2); // F o M
            $table->date('fecha_nacimiento');
            $table->text('direccion');
            $table->date("fecha");
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->binary('foto_1')->nullable();
            $table->integer('usersid')->nullable();
            $table->string('usersdni', 15)->nullable();
            $table->integer('estado');
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
        Schema::dropIfExists('encuestas');
    }
}
