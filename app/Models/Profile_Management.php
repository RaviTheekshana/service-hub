<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile_Management extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'service_provider_id',
        'service_description',
        'work_details',
        'experience_years',
        'hourly_rate',
    ];
}
