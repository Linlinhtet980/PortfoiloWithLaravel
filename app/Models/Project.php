<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'content',
        'cover_image',
        'images',
        'github_link',
        'live_link',
        'technologies',
        'views',
    ];

    protected $casts = [
        'technologies' => 'array',
        'images' => 'array',
    ];
}
