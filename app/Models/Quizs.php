<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizs extends Model
{
    use HasFactory;

    protected $table = 'quizs';
    protected $primaryKey = 'quizs_id';
    public $timestamps = false;
    protected $fillable = ['types_id', 'quizs_name', 'start_date', 'end_date', 'status','duration', 'token'];

   
public function detailQuizs()
{
    return $this->hasMany(DetailQuizs::class, 'quizs_id', 'quizs_id');
}


    // Relasi ke model Types
    public function type()
    {
        return $this->belongsTo(Types::class, 'types_id', 'types_id');
    }
    
}
