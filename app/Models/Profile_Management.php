<?php

namespace App\Models;

use App\Notifications\ProfileApprovedNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property false|mixed|string $profile_bg_path
 */
class Profile_Management extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'service_provider_id',
        'experience_years',
        'hourly_rate',
        'certificate_path',
        'profile_bg_path',
        'personal_summary',
        'work_experience',
        'category_id',
        'status'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificate_path');
        $this->addMediaCollection('project_images');
    }

    public function service_provider()
    {
        return $this
            ->belongsTo(User::class, 'service_provider_id')
            ->where('role', 'service_provider');
    }

    public function format()
    {

    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($profile) {
            if ($profile->status == 'approved') {
                $profile->service_provider->notify(new ProfileApprovedNotification([
                    'message' => 'Your profile has been approved!',
                    'action' => route('profile_management.index'),
                    event(new ProfileApprovedNotification([
                        'user_id' => $profile->service_provider_id,
                        'message' => 'Your profile has been approved!',
                        'service_time' => now()->format('Y-m-d H:i:s'),
                    ]))
                ]));
            }
        });
    }
}
