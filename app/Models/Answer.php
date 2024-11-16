<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $primaryKey = 'answers_id';

    protected $fillable = [
        'users_id',
        'quizs_id',
        'question_id',
        'answers',
        'score',
        'status'
    ];

    /**
     * Define a relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'users_id');
    }

    /**
     * Define a relationship to the Quiz model.
     */
    public function quiz()
    {
        return $this->belongsTo(Quizs::class, 'quizs_id', 'quizs_id');
    }

    /**
     * Define a relationship to the Question model.
     */
    public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id', 'questions_id');
    }
}
