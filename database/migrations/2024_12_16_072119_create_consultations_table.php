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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedDouble('cost');
            $table->unsignedFloat('rate');
            $table->string('Specialises');// reviewe

            $table->bigInteger('person_id')->unsigned()->nullable();
            $table->foreign('person_id')
            ->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('person_expert_id')->unsigned();
            $table->foreign('person_expert_id')
            ->references('id')->on('expereinces')->onDelete('cascade')->onUpdate('cascade');


            $table->boolean('isfinished');

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
        Schema::dropIfExists('consultations');
    }
};
