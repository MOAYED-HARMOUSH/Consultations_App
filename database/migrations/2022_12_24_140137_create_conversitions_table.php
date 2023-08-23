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
        Schema::create('conversitions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('people');

            $table->unsignedBigInteger('people_expert_id')->unsigned();
            $table->foreign('people_expert_id')->references('expert_id')->on('people');

            $table->longText('message');


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
        Schema::dropIfExists('conversitions');
    }
};
