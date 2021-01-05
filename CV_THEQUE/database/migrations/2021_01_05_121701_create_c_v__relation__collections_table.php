<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVRelationCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_v__relation__collections', function (Blueprint $table) {
            $table->id();
            $table->integer('cv_id')->unsigned();
            $table->foreign('cv_id')->references('id')->on('curriculum_vitae')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('cvCollection_id')->unsigned();
            $table->foreign('cvCollection_id')->references('id')->on('cv_collection')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('recruteur_id')->unsigned();
            $table->foreign('recruteur_id')->references('id')->on('recruteur')->onDelete('cascade')
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
        Schema::dropIfExists('c_v__relation__collections');
    }
}
