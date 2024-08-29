<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'description',
        'image_path',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function approve()
    {
        return $this->hasMany(Approve::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
