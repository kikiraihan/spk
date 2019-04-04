<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->tinyInteger('ordo');
            $table->string('matriks',900);
            $table->string('matriksNormalised',900);
            $table->string('kriteria',900);
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
        Schema::dropIfExists('criteria_preferences');
    }
}
