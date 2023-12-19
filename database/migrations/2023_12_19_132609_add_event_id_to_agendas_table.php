<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventIdToAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendas', function (Blueprint $table) {
            // Add EventId foreign key
            $table->unsignedBigInteger('EventId')->nullable();
            $table->foreign('EventId')->references('id')->on('events')->onDelete('cascade');
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
            $table->dropForeign(['EventId']);

            // Drop column
            $table->dropColumn('EventId');
        });
    }
}
