<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $primaryKey = 'types_id';
    public $timestamps = false;
    protected $fillable = ['types_name'];

    // Relasi ke model Quizs
    public function quizs()
    {
        return $this->hasMany(Quizs::class, 'types_id', 'types_id');
    }
}
