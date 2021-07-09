<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTakenQuestion extends Model
{
    use HasFactory;
    public function quiztaken()
    {
        return $this->belongsTo(QuizTaken::class);
    }

    public function quizquestion()
    {
        return $this->belongsTo(QuizQuestion::class, 'quiz_question_id', 'id');
    }
}
