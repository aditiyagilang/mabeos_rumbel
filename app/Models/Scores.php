<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    use HasFactory;

    protected $table = 'scores';
    protected $primaryKey = 'scores_id';
    public $timestamps = false;
    protected $fillable = ['quizs_id', 'users_id', 'score'];

    // Relasi ke model Quizs
    public function quiz()
    {
        return $this->belongsTo(Quizs::class, 'quizs_id', 'quizs_id');
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'user_id');
    }
}
