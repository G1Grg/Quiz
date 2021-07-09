<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function questionoptions()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function quiztakenquestions()
    {
        return $this->hasMany(QuizTakenQuestions::class);
    }
}
