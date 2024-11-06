<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choose extends Model
{
    use HasFactory;

    protected $table = 'choose';
    protected $primaryKey = 'choose_id';
    public $timestamps = false;
    protected $fillable = ['answers', 'questions_id'];

    // Relasi ke model Questions
    public function question()
    {
        return $this->belongsTo(Questions::class, 'questions_id', 'questions_id');
    }
}
