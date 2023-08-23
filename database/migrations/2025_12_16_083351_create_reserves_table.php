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
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('person_id');
            $table->bigInteger('person_expert_id');

            $table->bigInteger('consultation_id')->unsigned();
            $table->foreign('consultation_id')
            ->references('id')->on('consultations')->onDelete('cascade');

            $table->date('consultations_date');
            $table->string('consultations_place');
            $table->time('consultations_period');
            $table->text('consultations_content');



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
        Schema::dropIfExists('reserves');
    }
};
