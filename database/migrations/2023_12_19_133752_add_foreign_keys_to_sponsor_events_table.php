<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSponsorEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_events', function (Blueprint $table) {
            $table->id('SponsorEventsId');

            // Foreign key to sponsors table
            $table->unsignedBigInteger('SponsorId');
            $table->foreign('SponsorId')->references('SponsorId')->on('sponsors')->onDelete('cascade');

            // Foreign key to events table
            $table->unsignedBigInteger('EventId');
            $table->foreign('EventId')->references('id')->on('events')->onDelete('cascade');

            // Add other columns as needed

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
        Schema::dropIfExists('sponsor_events');
    }
}
