<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_date',
        'service_time',
        'category_id',
        'service_provider_id',
        'address',
        'city',
        'phone',
        'phone_two',
        'email',
        'status',
        'description',
    ];

    protected function casts()
    {
        return [
            'service_date' => 'timestamp',
        ];
    }

    public function service_provider()
    {
        return $this
            ->belongsTo(User::class, 'service_provider_id')
            ->where('role', 'service_provider');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
