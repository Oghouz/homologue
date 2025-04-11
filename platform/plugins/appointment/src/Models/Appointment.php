<?php

namespace Botble\Appointment\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Appointment extends BaseModel
{
    protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'date',
        'time'
    ];

    // protected $casts = [
    //     'status' => BaseStatusEnum::class,
    //     'name' => SafeContent::class,
    // ];
}
