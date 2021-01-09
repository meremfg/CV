<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoisirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loisirs', function (Blueprint $table) {
            $table->id();
            $table->text('centre_d_interet');
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
        Schema::dropIfExists('loisirs');
    }
}
