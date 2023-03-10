<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Kör migreringen.
     *
     * @return void
     */
    //Skapar tabellen
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70); //Podcastens namn
            $table->string('category', 50); //Podcastens kategori
            $table->integer('members'); //Antal medlemmar
            $table->boolean('weekly'); //Kommer den ut veckovis?
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
        Schema::dropIfExists('podcasts');
    }
};
