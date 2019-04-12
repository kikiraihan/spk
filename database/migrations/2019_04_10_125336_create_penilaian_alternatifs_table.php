<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_alternatifs', function (Blueprint $table) {
            // $table->increments('id');
            $table->longText('nilai')->nullable();

            $table->integer('id_penilai')->unsigned();//id_user
            $table->integer('id_preferensi')->unsigned();
            $table->integer('id_mahasiswa')->unsigned();

            //set PK
            $table->primary(['id_penilai','id_preferensi','id_mahasiswa'],'penilaian_alternatifs_gabungan3');


            $table->foreign('id_penilai')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_preferensi')->references('id')->on('criteria_preferences')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('penilaian_alternatifs');
    }
}
