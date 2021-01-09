<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceProfessionnellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience__professionnelles', function (Blueprint $table) {
            $table->id();
            $table->Date('DateDebut');
            $table->Date('DateFin');
            $table->text('Societe');
            $table->text('Mission');
            $table->Integer('Duree');
            $table->integer('cv_id')->unsigned();
            $table->foreign('cv_id')->references('id')->on('curriculum_vitae')->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('experience__professionnelles');
    }
}
