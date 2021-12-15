<?php

namespace App\Data\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @package App\Data\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * {@inheritdoc}
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * {@inheritdoc}
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
