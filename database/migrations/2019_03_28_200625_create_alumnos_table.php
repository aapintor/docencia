<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alumnos', function(Blueprint $table){
          $table->string('no_de_control',8)->unique();
          $table->string('nombre_alumno');
          $table->string('apellido_paterno');
          $table->string('apellido_materno');
          $table->integer('carrera')->unsigned();
          $table->foreign('carrera')->references('id')->on('carreras');
          $table->string('correo_electronico')->nullable();
          $table->string('sexo');
          $table->timestamps();
          $table->primary('no_de_control');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
