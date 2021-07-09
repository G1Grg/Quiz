<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTakenQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_taken_questions', function (Blueprint $table) {
            $table->id();
            $table->integer("quiz_taken_id");
            $table->integer("quiz_question_id");
            $table->string("given_answer")->nullable();
            $table->string("correct_answer");
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
        Schema::dropIfExists('quiz_taken_questions');
    }
}
