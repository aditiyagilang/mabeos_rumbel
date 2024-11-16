<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $primaryKey = 'questions_id';
    public $timestamps = false;
    protected $fillable = ['type', 'questions', 'answers'];

    // Relasi ke model Choose
    public function choices()
    {
        return $this->hasMany(Choose::class, 'questions_id', 'questions_id');
    }

    // Relasi ke model DetailQuizs
    public function detailQuizs()
    {
        return $this->hasMany(DetailQuizs::class, 'question_id', 'questions_id');
    }

    
}
