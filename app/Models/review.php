<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_provider_id',
        'booking_id',
        'comment',
        'rating'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service_provider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

}
