<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Default()
 * @method static static Info()
 * @method static static Success()
 * @method static static Warning()
 * @method static static Danger()
 * @method static static Rose()
 * @method static static Primary()
 */
final class Alert extends Enum
{
    public const Default = '';
    public const Info = 'info';
    public const Success = 'success';
    public const Warning = 'warning';
    public const Danger = 'danger';
    public const Rose = 'rose';
    public const Primary = 'primary';
}
