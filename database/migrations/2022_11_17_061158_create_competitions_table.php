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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('tutors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('orphanage_id');
            $table->foreign("orphanage_id")->references('id')->on('orphanages')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string("title");
            $table->string("location");
            $table->string("description");
            $table->string("category");
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
        Schema::dropIfExists('competitions');
    }
};
