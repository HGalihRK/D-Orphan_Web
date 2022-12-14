<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('tutors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('description')->nullable();
            $table->integer('hourly_price');
            $table->integer('is_online')->default(0);
            $table->integer('is_visit')->default(0);
            $table->integer('maximum_member')->default(1);
            $table->integer('tool_price')->nullable();
            $table->string('tool_description')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
