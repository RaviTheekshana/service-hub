<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 *
 * @property string $name
 * @property int $sort_order
 * @property string $status
 */
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'sort_order',
        'status',
    ];
}

