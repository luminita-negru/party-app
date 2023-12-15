<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Add SponsorId foreign key
            $table->unsignedBigInteger('SponsorId')->nullable();
            $table->foreign('SponsorId')->references('SponsorId')->on('sponsors')->onDelete('cascade');

            // Add ArtistId foreign key
            $table->unsignedBigInteger('ArtistId')->nullable();
            $table->foreign('ArtistId')->references('ArtistId')->on('artists')->onDelete('cascade');

            // Add AgendaId foreign key
            $table->unsignedBigInteger('AgendaId')->nullable();
            $table->foreign('AgendaId')->references('AgendaId')->on('agendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['SponsorId']);
            $table->dropForeign(['ArtistId']);
            $table->dropForeign(['AgendaId']);

            // Drop columns
            $table->dropColumn('SponsorId');
            $table->dropColumn('ArtistId');
            $table->dropColumn('AgendaId');
        });
    }
}
