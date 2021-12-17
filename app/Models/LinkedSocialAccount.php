<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LinkedSocialAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_id
 * @property string $provider_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class LinkedSocialAccount extends Model
{
    use HasFactory;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_name',
    ];
}
