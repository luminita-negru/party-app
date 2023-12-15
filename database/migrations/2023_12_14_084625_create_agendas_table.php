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
    Schema::create('agendas', function (Blueprint $table) {
        $table->id('AgendaId');
        $table->foreignId('id')->constrained('events');
        $table->foreignId('ArtistId')->constrained('artists');
        $table->foreignId('SponsorId')->constrained('sponsors');
        $table->string('activity');
        $table->dateTime('startTime');
        $table->dateTime('finishTime');
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
        Schema::dropIfExists('agendas');
    }
};
