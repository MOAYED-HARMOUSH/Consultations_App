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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('img_bath')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender'); // مؤثتا سترينغ
            $table->date('birth_date');
            $table->bigInteger('expert_id')->unsigned()->nullable();
            //$table->foreignId('expert_id')->nullable()->constrained('expereinces')->cascadeOnDelete()->cascadeOnUpdate();
$table ->foreign('expert_id')->references('id')->on('expereinces')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('people');
    }
};
