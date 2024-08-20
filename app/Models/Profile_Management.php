<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile_Management extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'service_provider_id',
        'experience_years',
        'hourly_rate',
        'certificate_path',
        'personal_summary',
        'work_experience',
        'category_id',
        'status'
    ];
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
