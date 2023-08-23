<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experttimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expert_id')->unsigned();
            $table->foreign('expert_id')->references('id')->on('expereinces')->onDelete('cascade');
            $table->date('date_const');
            $table->time('time_const');
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
        Schema::dropIfExists('experttimes');
    }
};
