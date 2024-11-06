<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailQuizs extends Model
{
    use HasFactory;

    protected $table = 'detail_quizs';
    public $timestamps = false;
    protected $fillable = ['quizs_id', 'question_id'];

    // Relasi ke model Quizs
    public function quiz()
    {
        return $this->belongsTo(Quizs::class, 'quizs_id', 'quizs_id');
    }

    // Relasi ke model Questions
    public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id', 'questions_id');
    }
}
