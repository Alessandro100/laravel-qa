<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //properties of a model
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->unsignedInteger('views')->default(0);//werid
            $table->unsignedInteger('answers')->default(0);
            $table->integer('votes')->default(0);
            $table->unsignedInteger('best_answer_id')->nullable();//weird fk?
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            //FK
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //we are going to have one for answers
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
