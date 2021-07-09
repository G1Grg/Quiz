<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTaken extends Model
{
    use HasFactory;
    public function quiztakenquestions()
    {
        return $this->hasMany(QuizTakenQuestion::class);
    }
}
