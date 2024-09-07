<?php

namespace App\Models;

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
}
