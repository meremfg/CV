<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifications', function (Blueprint $table) {
            $table->id();
            $table->binary('image');
            $table->String('nom',50);
            $table->String('prenom',30);
            $table->text('adresse');
            $table->Integer('CodePostale');
            $table->String('ville',80);
            $table->String('telephone',14);
            $table->Date('DateDeNaissance');
            $table->String('StatuMarital',50);
            $table->String('PermisDeConduit',5);
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
        Schema::dropIfExists('identifications');
    }
}
