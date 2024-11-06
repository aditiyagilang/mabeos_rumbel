<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'users_id';
    public $timestamps = false;

    protected $fillable = [
        'address',
        'name',
        'username',
        'birthdate',
        'email',
        'password',
        'telp',
        'img_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi ke model Scores
    public function scores()
    {
        return $this->hasMany(Scores::class, 'users_id', 'users_id');
    }
}
