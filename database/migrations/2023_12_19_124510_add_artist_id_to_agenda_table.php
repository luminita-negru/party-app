<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArtistIdToAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendas', function (Blueprint $table) {
            // Add ArtistId foreign key
            $table->unsignedBigInteger('ArtistId')->nullable();
            $table->foreign('ArtistId')->references('ArtistId')->on('artists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendas', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['ArtistId']);

            // Drop column
            $table->dropColumn('ArtistId');
        });
    }
}
