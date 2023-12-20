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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');

            // Foreign key to events table
            $table->unsignedBigInteger('EventId');
            $table->foreign('EventId')->references('id')->on('events')->onDelete('cascade');
            $table->integer('nr_tickets');
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
        Schema::dropIfExists('carts');
    }
};
